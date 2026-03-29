@extends('layouts.app')

@section('content')
    <x-form-component action="{{route('profile.update')}}" id="loginForm" method="PATCH">
        <h2>Cadastrar-se</h2>
        <div class="form-group div-input">
            <input type="text" name="name" class="form-control" id="input-user" required value="{{ $user->name }}">
            <label for="input-user">Usuário</label>
        </div>
        
        <div class="form-group div-input">
            <input type="email" class="form-control" id="input-email" aria-describedby="email-help" readonly value="{{ $user->email }}">
            <label for="input-email" class="label-active">Endereço de e-mail</label>
        </div>
        
        <div class="form-group div-input">
            <input type="text" name="first_name" class="form-control" id="input-first-name" required value="{{ $user->first_name }}">
            <label for="input-first-name">Primeiro Nome</label>
        </div>
        
        <div class="form-group div-input">
            <input type="text" name="last_name" class="form-control" id="input-second-name" required value="{{ $user->last_name }}">
            <label for="input-second-name">Sobrenome</label>
        </div>

        <button type="submit" class="btn btn-dark">Editar</button>
    </x-form-component>
@endsection