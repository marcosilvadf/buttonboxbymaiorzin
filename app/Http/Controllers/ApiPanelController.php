<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Panel;
use App\Models\PcHashTrial;
use App\Models\UserPcHash;
use Carbon\Carbon;
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

            $panel = Panel::find(3);
            $ads = Ad::all();

            return view('panel.freepanel', [
                'panel' => $panel,
                'ads' => $ads
            ]);
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
            $panel = Panel::find(3);
        } else {
            $panel = $user->panel->panel;
        }
        
        return view('panel.panel', [
            'panel' => $panel
        ]);
    }

    public function returnHtmlTrial(string $pchash)
    {
        if (!Str::isUuid($pchash)) {
            Log::channel('api_recovery_html')->info(
                'Tentativa com hash de pc errado',
                [
                    'pchash' => $pchash,
                    'ip' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'url' => request()->fullUrl()
                ]
            );
            return view('panel.message', [
                'title' => 'Erro ao validar dispositivo',
                'paragraph' => 'Não foi possível validar este dispositivo. Tente abrir novamente pelo aplicativo ou reinicie o programa.',
                'route' => route('index'),
                'titleRouth' => 'Voltar'
            ]);
        }

        $pcHashRecord = UserPcHash::where('pc_hash', $pchash)
            ->first();

        if($pcHashRecord) {
            return view('panel.message', [
                'title' => 'Atenção',
                'paragraph' => 'Foi identificado que você pode ter um perfil já cadastrado!',
                'route' => route('login'),
                'titleRouth' => 'Acessar Perfil'
            ]);
        }

        $pcHashTrial = PcHashTrial::firstOrCreate(
            ['pc_hash' => $pchash],
            ['first_ip' => request()->ip(), 'updated_ip' => request()->ip()]
        );

        $pcHashTrial->update([
            'updated_ip' => request()->ip()
        ]);
                
        $panel = Panel::find(3);
        $ads = Ad::all();
        
        return view('panel.freepanel', [
            'panel' => $panel,
            'ads' => $ads
        ]);
    }
}
