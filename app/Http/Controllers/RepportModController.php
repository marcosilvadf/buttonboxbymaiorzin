<?php

namespace App\Http\Controllers;

use App\Models\Mod;
use App\Models\RepportMod;
use Illuminate\Http\Request;

class RepportModController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repports = RepportMod::where('user_id', auth()->id())
        ->get();

        $receivedRepports = RepportMod::whereHas('mod', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        return view('repport.index', [
            'repports' => $repports,
            'receivedRepports' => $receivedRepports
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mod $mod)
    {
        /* if($mod->user_id && auth()->id()) {
            return redirect()->route('mods.show', $mod->slug)->withErrors(['erro' => 'Você não pode denunciar o próprio mod.']);
        } */

        $repport = RepportMod::where('user_id', auth()->id())
        ->where('mod_id', $mod->id)
        ->first();

        if($repport) {
            return redirect()->route('mods.show', $mod->slug)->withErrors(['erro' => 'Você já fez uma denúncia para esse mod.']);
        }

        return view('repport.create', [
            'mod' => $mod
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Mod $mod)
    {
        $repport = new RepportMod;

        $repport->user_id = auth()->id();
        $repport->mod_id = $mod->id;
        $repport->message = $request->message;
        $repport->save();

        return redirect()->route('mods.show', $mod->slug)->with('status', 'Denúncia enviada com sucesso! Aguarde a análise!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RepportMod $repportMod)
    {
        $this->authorize('delete', $repportMod);
        
        $repportMod->delete();

        return redirect()->back()->with('status', 'Denúncia removida com sucesso.');
    }
}
