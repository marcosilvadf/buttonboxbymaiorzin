<?xml version="1.0" encoding="UTF-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    {{-- Página inicial --}}
    <url>
        <loc>{{ url('/') }}</loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>

    {{-- Página de planos --}}
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

    {{-- Posts fixos --}}
    <url>
        <loc>{{ url('/posts/button-box-ets2-gratis-app-dashboard') }}</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    {{-- Adicione mais posts manualmente aqui --}}
    
</urlset>