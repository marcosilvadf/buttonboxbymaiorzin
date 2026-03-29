@extends('layouts.app')

@section('content')
    <div class="profile">
        <a href="{{ route('mods.create') }}" class="btn btn-dark">Cadastrar Mods</a>
    </div>

    @foreach ($mods as $mod)
        <x-show-mod-component :mod="$mod" :owner="true"></x-show-mod-component>
    @endforeach
    
    <div class="paginate-custom">
        {{ $mods->links('pagination::bootstrap-5') }}
    </div>

    <form method="POST" id="form-mod-id">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('javascript')
    <script src="{{ asset('js/ratings.js') }}?{{ config('app.version') }}"></script>

    <script>
        function deleteMod(id) {            
            if(confirm("Atenção: você realmente deseja deletar o post do mod?")) {
                let form = $('#form-mod-id');
                form.attr('action', `/mods/deletar/${id}`);
                form.submit();
            }
        }
    </script>
@endsection