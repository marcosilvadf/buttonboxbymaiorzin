@extends('layouts.app')

@section('content')
    <x-form-component action="{{route('register.store')}}" id="loginForm">
        <h2>Cadastrar-se</h2>
        <div class="form-group div-input">
            <input type="text" name="name" class="form-control" id="input-user" required value="{{ old('name') }}" placeholder=" ">
            <label for="input-user">Usuário</label>
        </div>
        
        <div class="form-group div-input">
            <input type="email" name="email" class="form-control" id="input-email" aria-describedby="email-help" required value="{{ old('email') }}" placeholder=" ">
            <label for="input-email">Endereço de e-mail</label>
            <small id="email-help" class="form-text text-muted">Lembre-se de adicionar um e-mail válido.</small>
        </div>
        
        <div class="form-group div-input">
            <input type="text" name="first_name" class="form-control" id="input-first-name" required value="{{ old('first_name') }}" placeholder=" ">
            <label for="input-first-name">Primeiro Nome</label>
        </div>
        
        <div class="form-group div-input">
            <input type="text" name="last_name" class="form-control" id="input-second-name" required value="{{ old('last_name') }}" placeholder=" ">
            <label for="input-second-name">Sobrenome</label>
        </div>
        
        <div class="form-group div-input">
            <input type="password" name="password" class="form-control" id="input-password" required placeholder=" ">
            <label for="input-password">Senha</label>
        </div>
        
        <div class="form-group div-input">
            <input type="password" name="password_confirmation" class="form-control" id="input-confirm-password" required placeholder=" ">
            <label for="input-confirm-password">Confirmar Senha</label>
        </div>

        <div class="form-check custom-checkbox mt-3">
            <input 
                class="form-check-input" 
                type="checkbox" 
                id="terms" 
                name="terms"                 
            >
            <label class="form-check-label" for="terms">
                Eu li e aceito os 
                <a href="{{ route('terms') }}" target="_blank">Termos de Uso</a> 
                e a 
                <a href="{{ route('privacypolicy') }}" target="_blank">Política de Privacidade</a>
            </label>
        </div>
        
        <button type="submit" class="btn btn-dark">Cadastrar</button>

        <small class="form-text text-muted">Ao se cadastrar você concorda com os termos de uso e a política de privacidade.</small>
        <a href="{{route('login')}}">Login</a>
    </x-form-component>
@endsection