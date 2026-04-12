<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Panel;
use App\Models\UserPcHash;
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
            return abort(404);
        }

        if(!$confirmHash)
        {
            return abort(401);
        }

        if(!$user->is_pro)
        {
            return abort(401);
        }

        if (!Str::isUuid($pchash)) {
            return abort(401);
        }

        $pcHashRecord = UserPcHash::where('pc_hash', $pchash)
            ->where('user_id', '!=', $user->id)
            ->first();

        if ($pcHashRecord) {
            if(!$pcHashRecord->user->is_pro) {
                return abort(401);
            }
        }

        UserPcHash::updateOrCreate([
            'user_id' => $user->id
        ], [
            'pc_hash' => $pchash
        ]);

        $panel = $user->panel->where('current', true)->first();

        if(!$panel) {
            $panel = Panel::find(1);
        }

        return view('panel.panel', [
            'panel' => $panel
        ]);
    }
}
