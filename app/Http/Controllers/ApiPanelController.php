<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Panel;
use Illuminate\Http\Request;

class ApiPanelController extends Controller
{
    public function returnHtmlHashUser(string $hash)
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

        $panel = $user->panel->where('current', true)->first();

        if(!$panel) {
            $panel = Panel::find(1);
        }

        return view('panel.panel', [
            'panel' => $panel
        ]);
    }
}
