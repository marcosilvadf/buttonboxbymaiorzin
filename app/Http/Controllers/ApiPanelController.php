<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Panel;
use App\Models\UserPcHash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ApiPanelController extends Controller
{
    public function returnHtmlHashUser(string $pchash, string $hash)
    {
        $hash = explode('-', $hash);

        $userHash = $hash[0] ?? null;
        $confirmHash = $hash[1] ?? null;
        
        $user = User::where('link_code', $userHash)
        ->first();

        if(!$user)
        {
            Log::channel('api_recovery_html')->info(
                'Tentativa sem hash de user',
                [
                    'user_hash' => $userHash,
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url' => request()->fullUrl()
                ]
            );
            return view('panel.not_found');
        }

        if(!$confirmHash)
        {
            Log::channel('api_recovery_html')->info(
                'Tentativa sem hash de confirmação',
                [
                    'user' => $user->id,
                    'user_name' => $user->name,
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url' => request()->fullUrl()
                ]
            );
            return view('panel.not_found');
        }

        if(!$user->is_pro)
        {
            Log::channel('api_recovery_html')->info(
                'Tentativa sem user pro',
                [
                    'user' => $user->id,
                    'user_name' => $user->name,
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url' => request()->fullUrl()
                ]
            );
            return view('panel.expired');
        }

        if (!Str::isUuid($pchash)) {
            Log::channel('api_recovery_html')->info(
                'Tentativa com hash de pc errado',
                [
                    'user' => $user->id,
                    'user_name' => $user->name,
                    'pchash' => $pchash,
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url' => request()->fullUrl()
                ]
            );
            return view('panel.expired');
        }

        $pcHashRecord = UserPcHash::where('pc_hash', $pchash)
            ->where('user_id', '!=', $user->id)
            ->first();

        if ($pcHashRecord) {
            if(!$pcHashRecord->user->is_pro) {
                Log::channel('api_recovery_html')->info(
                    'Tentativa com nova conta',
                    [
                        'user' => $user->id,
                        'user_name' => $user->name,
                        'user2' => $pcHashRecord->user->id,
                        'user_name2' => $pcHashRecord->user->name,
                        'pchash' => $pchash,
                        'ip' => request()->ip(),
                        'user_agent' => request()->userAgent(),
                        'url' => request()->fullUrl()
                    ]
                );
                return view('panel.expired');
            }
        }

        UserPcHash::updateOrCreate([
            'user_id' => $user->id
        ], [
            'pc_hash' => $pchash
        ]);

        $panel = $user->panel->where('current', true)->first();

        if(!$panel) {
            $panel = Panel::latest('id')->first();
        }

        return view('panel.panel', [
            'panel' => $panel
        ]);
    }
}
