<div class="profile" @if (isset($owner) && $owner) @else onclick="location.href = '{{ route('mods.show', $mod->slug) }}'" @endif>
    <div class="w-100 mb-3 text-center">
        @if ($mod->images->first())
            <img alt="{{ $mod->images->first()->alt }}" src="{{ $mod->images->first()->url }}" style="max-width: 100%; height: auto; border-radius: 10px;">
        @else
            <div class="d-flex align-items-center justify-content-center bg-light" style="height: 200px; border-radius: 10px;">
                <i class="fa fa-image" style="font-size: 60px; color: #ccc;"></i>
            </div>
        @endif
    </div>

    <span class="h1 text-uppercase">{{ $mod->title }}</span>
    <span class="h4">{{ $mod->category->name }}</span>
    <span class="w-100">{{ $mod->game->name }} - versão: {{ $mod->gameVersion->version }}</span>
    <span class="w-100">Postado por: <span class="fw-bold">{{ $mod->user->name }}</span></span>
    <span>{{ $mod->description }}</span>
    {{-- <div class="rating w-100 d-flex justify-content-end" data-id="{{ $mod->id }}" data-rating="{{ $mod->average_rating }}">
        <i class="fa fa-star star" data-value="1"></i>
        <i class="fa fa-star star" data-value="2"></i>
        <i class="fa fa-star star" data-value="3"></i>
        <i class="fa fa-star star" data-value="4"></i>
        <i class="fa fa-star star" data-value="5"></i>
    </div> --}}
    <span class="w-100">Versão do mod: {{ $mod->version }}</span>
    @foreach ($mod->links as $link)
        <a class="btn btn-dark m-2" href="{{ $link->link }}" target="_blank">{{ $link->description }}</a>
    @endforeach
    @if (isset($owner) && $owner)
        @php
            $colors = [
                'pending' => 'warning',
                'approved' => 'success',
                'rejected' => 'danger',
            ];
        @endphp

        <div class="w-100">
            <span class="bg-{{ $colors[$mod->status] }} p-2 rounded">
                Situação: {{ __('status.' . $mod->status) }}
            </span>
        </div>

        <div class="w-100 d-flex justify-content-end my-2">
            <a class="btn btn-dark" href="{{ route('mods.edit', $mod->id) }}">Editar Post</a>
        </div>

        <div class="w-100 d-flex justify-content-end my-2">
            <a class="btn btn-dark" onclick="deleteMod({{ $mod->id }})">Deletar Post</a>
        </div>
    @else
        @if (isset($report) && $report)
            <div class="w-100 d-flex my-2">
                <a class="" href="{{ route('repport.create', $mod->id) }}">Denunciar</a>
            </div>
        @else
            <div class="w-100 d-flex justify-content-end my-2">
                <a class="btn btn-dark" id="btn-see-mod-{{$mod->id}}" href="{{ route('mods.show', $mod->slug) }}">Ver mod</a>
            </div>
        @endif
    @endif
</div>
