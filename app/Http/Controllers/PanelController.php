<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Models\UserPanel;

//use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        $panels = Panel::select(['id', 'name', 'image'])
        ->orderBy('id', 'DESC')
        ->paginate(15);

        return view('panels.index', [
            'panels' => $panels
        ]);
    }

    public function preview(Panel $panel)
    {
        $currentPanel = auth()->check() && auth()->user()->panel && auth()->user()->panel->panel_id == $panel->id;
        
        return view('panels.preview', [
            'panel' => $panel,
            'current' => $currentPanel
        ]);
    }

    public function select(Panel $panel)
    {
        if(!auth()->check()) {
            return redirect()->back()->withErrors('Faça o login para continuar');
        }

        if(!auth()->user()->is_pro) {
            return redirect()->back()->withErrors('Recurso liberado apenas para usuários pro');
        }

        $user = auth()->user();
        
        UserPanel::updateOrCreate(
            ['user_id' => $user->id],
            [
                'panel_id' => $panel->id,
                'css' => '',
                'html' => '',
                'current' => true
            ]
        );

        return redirect()->back()->with('status', 'Painél selecionado com sucesso!');
    }
}
