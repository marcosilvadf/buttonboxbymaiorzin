@extends('layouts.app')

@section('content')
    <x-form-component action="{{ route('password.store') }}" id="loginForm">
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <h2>Alterar senha</h2>
        <div class="form-group div-input">
            <input type="email" name="email" class="form-control" id="input-email" aria-describedby="email-help" value="{{old('email', $request->email)}}" required placeholder=" ">
            <label for="input-email">Endereço de e-mail</label>
        </div>
        
        <div class="form-group div-input">
            <input type="password" name="password" class="form-control" id="input-password" required placeholder=" ">
            <label for="input-password">Senha</label>
        </div>
        
        <div class="form-group div-input">
            <input type="password" name="password_confirmation" class="form-control" id="input-confirm-password" required placeholder=" ">
            <label for="input-confirm-password">Confirmar Senha</label>
        </div>
        
        <button type="submit" class="btn btn-dark">Alterar senha</button>
    </x-form-component>
@endsection