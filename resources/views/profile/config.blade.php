@extends('layouts.app')

@section('content')
    <div class="profile">
        <a class="btn btn-dark my-2" href="{{ route('profile.update') }}">Editar Perfil</a>
        <a class="btn btn-danger my-2" href="{{ route('profile.delete') }}">Deletar Perfil</a>
    </div>
    
    <form action="{{ route('profile.destroy') }}" method="DELETE" id="delete-profile" style="display: none">
        @csrf
    </form>
@endsection