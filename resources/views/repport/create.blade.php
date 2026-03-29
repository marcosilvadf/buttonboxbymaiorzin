@extends('layouts.app')

@section('content')
    <x-form-component action="{{ route('repport.store', $mod->id) }}" id="loginForm">
        <h2>Denunciar mod</h2>
        <span class="w-100 text-center fw-bold fs-2">Mod: {{ $mod->title }}</span>
        <div class="form-group div-input">
            <input type="text" name="message" class="form-control" id="input-message" value="{{old('message')}}" required placeholder=" ">
            <label for="input-message">Sua denúncia</label>
        </div>
        
        <button type="submit" class="btn btn-dark">Enviar denúncia</button>
    </x-form-component>
@endsection