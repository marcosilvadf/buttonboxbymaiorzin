@extends('layouts.app')

@section('content')
    <x-form-component action="{{ route('password.email') }}" id="loginForm">
        <h2>Esqueceu a senha</h2>
        <div class="form-group div-input">
            <input type="email" name="email" class="form-control" id="input-email" aria-describedby="email-help" required placeholder=" ">
            <label for="input-email">Endereço de e-mail</label>
        </div>
        
        <button type="submit" class="btn btn-dark">Enviar e-mail</button>
    </x-form-component>
@endsection