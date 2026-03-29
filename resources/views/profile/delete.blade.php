@extends('layouts.app')

@section('content')
    <x-form-component action="{{route('profile.destroy')}}" method="DELETE" id="deleteForm" onsubmit="deleteProfile(event)">
        <h2>Deletar Perfil</h2>
        <span>Para deletar o perfil coloque sua senha para confirmar que é você mesmo!</span>
        <div class="form-group div-input">
            <input type="password" name="password" class="form-control" id="input-password" required>
            <label for="input-password">Senha</label>
        </div>
        
        <div class="form-group div-input">
            <input type="password" name="password_confirmation" class="form-control" id="input-confirm-password" required>
            <label for="input-confirm-password">Confirmar Senha</label>
        </div>
        
        <button type="submit" class="btn btn-dark">Deletar Perfil</button>
    </x-form-component>

    @section('javascript')
        <script>
            function deleteProfile(e) {
                e.preventDefault();
                showAlert('info', 'Tem certeza?', 'Ao deletar seu perfil todos os seus dados serão apagados, incluíndo pagamentos!')
                .then((result) => {
                    if (result) {
                        document.getElementById('deleteForm').submit();
                    }
                });
            }
        </script>
    @endsection
@endsection