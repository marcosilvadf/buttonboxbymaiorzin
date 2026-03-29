@extends('layouts.app')

@section('title')
{{ $mod->title }} para {{ $mod->game->name }} | Download e Detalhes
@endsection

@section('meta')
    <meta name="description" content="{{ Str::limit(strip_tags($mod->description), 150) }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $mod->title }} para {{ $mod->game->name }}">
    <meta property="og:description" content="{{ Str::limit(strip_tags($mod->description), 150) }}">
    @if ($mod->images->first())            
            <meta property="og:image" content="{{ $mod->images->first()->url }}?{{ config('app.app_version') }}">
            <meta name="twitter:image" content="{{ $mod->images->first()->url }}?{{ config('app.app_version') }}">
        @else
            <meta property="og:image" content="{{ asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
            <meta name="twitter:image" content="{{ asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
        @endif
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $mod->title }}">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($mod->description), 150) }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
    <x-show-mod-component :mod="$mod" :report="true"></x-show-mod-component>
@endsection

@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('click', function (e) {
                const star = e.target.closest('.star');
                if (!star) return;

                console.log(star.dataset.value);

                const ratingDiv = star.closest('.rating');
                const modId = ratingDiv.dataset.id;

                fetch(`/rating`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        mod_id: modId,
                        rating: star.dataset.value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    updateStars(ratingDiv, star.dataset.value);
                })
                .catch(err => console.error(err));
            });            
        });

        function updateStars(container, rating) {
            container.querySelectorAll('.star').forEach(star => {
                if (star.dataset.value <= rating) {
                    star.classList.add('text-warning'); // amarelo
                } else {
                    star.classList.remove('text-warning');
                }
            });
        }
    </script>
@endsection