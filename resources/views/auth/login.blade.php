@extends('layouts.app')

@section('content')
    <x-form-component action="{{route('login')}}" id="loginForm">
        <h2>Entrar</h2>
        <div class="form-group div-input">
            <input type="email" name="email" class="form-control" id="input-email" aria-describedby="email-help" value="{{old('email')}}" required placeholder=" ">
            <label for="input-email">Endereço de e-mail</label>
        </div>

        <div class="form-group div-input">
            <input type="password" name="password" class="form-control" id="input-password" required placeholder=" ">
            <label for="input-password">Senha</label>
        </div>
        
        <button type="submit" class="btn btn-dark">Entrar</button>

        <a href="{{route('password.request')}}">Esqueci a senha</a>
        <a href="{{route('register')}}">Cadastrar-se</a>
    </x-form-component>
@endsection