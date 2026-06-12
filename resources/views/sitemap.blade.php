<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Home page --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Plan page --}}
    <url>
        <loc>{{ route('plan') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    {{-- Mods --}}
    @foreach ($mods as $mod)
        <url>
            <loc>{{ route('mods.show', $mod->slug) }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    {{-- Panels --}}
    <url>
        <loc>{{ route('panel.index') }}</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    @foreach ($panels as $panel)
        <url>
            <loc>{{ route('panel.preview', ['panel' => $panel->id, 'name' => Str::slug($panel->name)]) }}</loc>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach

    {{-- Fixed posts --}}    
    
</urlset>