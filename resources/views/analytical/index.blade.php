@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4">Análises</h1>

    <div class="row">

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5>Usuários</h5>
                    <h2>{{ $data['users'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5>Trial</h5>
                    <h2>{{ $data['pcHashTrials'] }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-body">
                    <h5>Cadastrados</h5>
                    <h2>{{ $data['userPcHashes'] }}</h2>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection