<?php

namespace App\Http\Controllers;

use App\Http\Requests\Mod\StoreModRequest;
use App\Models\CategoryMod;
use App\Models\GameMod;
use App\Models\GameVersionMod;
use App\Models\Mod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = CategoryMod::all();
        $games = GameMod::all();
        $gameVersions = GameVersionMod::all();

        $mods = Mod::where('status', 'approved')
        ->orderBy('id', 'desc')
        ->paginate(15);

        return view('mods.index', [
            'mods' => $mods,
            'categories' => $categories,
            'games' => $games,
            'gameVersions' => $gameVersions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $textHelpInputLinks = Mod::textHelpInputLinks();

        $categories = CategoryMod::all();
        $games = GameMod::all();
        $gameVersions = GameVersionMod::all();

        return view('mods.create', [
            'categories' => $categories,
            'games' => $games,
            'gameVersions' => $gameVersions,
            'textHelpInputLinks' => $textHelpInputLinks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModRequest $request)
    {
        $mod = new Mod;

        $mod->user_id = auth()->id();
        $mod->game_mod_id = $request->game;
        $mod->game_version_mod_id = $request->game_version;
        $mod->category_mod_id = $request->category;
        $mod->title = $request->title;
        $mod->status = 'approved';
        $mod->slug = Str::slug($request->title) . '-' . uniqid();
        $mod->description = $request->description;
        $mod->version = $request->mod_version;

        $mod->save();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('mod_images/' . auth()->id(), 'public');
            
            $mod->images()->create([
                'mod_id' => $mod->id,
                'link' => $path,
                'cover' => 1,
                'alt' => 'imagem do mod ' . $mod->title                  
            ]);
        }

        foreach ($request->link as $key => $url) {            
            if ($url) {
                $mod->links()->create([
                    'link' => $url,
                    'description' => $request->txt_link[$key]
                ]);
            }
        }

        return redirect()->route('mods.manager')->with('status', 'Mod cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $mod = Mod::where('slug', $slug)
        ->first();

        if(!$mod) {
            return redirect()->route('mods.index')->withErrors(['erro' => 'Mod não encontrado!']);
        }
        
        return view('mods.show', [
            'mod' => $mod
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mod $mod)
    {
        $this->authorize('update', $mod);

        $textHelpInputLinks = Mod::textHelpInputLinks();

        $categories = CategoryMod::all();
        $games = GameMod::all();
        $gameVersions = GameVersionMod::all();
        
        $gameVersionGameSelected = GameVersionMod::where('game_mod_id', $mod->game_mod_id)
        ->get();

        return view('mods.edit', [
            'categories' => $categories,
            'games' => $games,
            'gameVersions' => $gameVersions,
            'gameVersionGameSelected' => $gameVersionGameSelected,
            'textHelpInputLinks' => $textHelpInputLinks,
            'mod' => $mod
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mod $mod)
    {
        $this->authorize('update', $mod);

        DB::transaction(function () use ($request, $mod) {

            $mod->update([
                'game_mod_id' => $request->game,
                'game_version_mod_id' => $request->game_version,
                'category_mod_id' => $request->category,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'version' => $request->mod_version,
            ]);

            if ($request->hasFile('image')) {

                $oldImage = $mod->images()->where('cover', 1)->first();

                if ($oldImage) {
                    Storage::disk('public')->delete($oldImage->link);
                    $oldImage->delete();
                }

                $path = $request->file('image')->store('mod_images/' . auth()->id(), 'public');

                $mod->images()->create([
                    'link' => $path,
                    'cover' => 1,
                    'alt' => 'imagem do mod ' . $mod->title
                ]);
            }

            $mod->links()->delete();

            foreach ($request->link as $key => $url) {
                if ($url) {
                    $mod->links()->create([
                        'link' => $url,
                        'description' => $request->txt_link[$key]
                    ]);
                }
            }
        });

        return redirect()
            ->route('mods.manager')
            ->with('status', 'Mod atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mod $mod)
    {
        $this->authorize('delete', $mod);

        $mod->load('images');
        $mod->delete();

        return back()->with('status', 'Mod deletado com sucesso.');
    }

    public function manager()
    {
        $mods = Mod::with(['game', 'gameVersion', 'category', 'links', 'images', 'ratings',])
        ->where('user_id', auth()->id())
        ->orderBy('id', 'DESC')
        ->paginate(15)
        ->withQueryString();

        return view('mods.manager', [
            'mods' => $mods
        ]);
    }

    public function filter(Request $request)
    {
        $categories = CategoryMod::all();
        $games = GameMod::all();
        $gameVersions = GameVersionMod::all();

        $version = $request->version == 1 || $request->version == 2 ? null : $request->version;

        $mods = Mod::with(['game', 'gameVersion', 'category'])
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_mod_id', $request->category);
            })
            ->when($request->game, function ($query) use ($request) {
                $query->where('game_mod_id', $request->game);
            })
            ->when($version, function ($query) use ($version) {
                $query->where('game_version_mod_id', $version);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('mods.index', [
            'mods' => $mods,
            'categories' => $categories,
            'games' => $games,
            'gameVersions' => $gameVersions,
            'categorySelected' => $request->category ?? null,
            'gameSelected' => $request->game ?? null,
            'gameVersionSelected' => $request->version ?? null,
            'search' => $request->search ?? null,
        ]);
    }
}
