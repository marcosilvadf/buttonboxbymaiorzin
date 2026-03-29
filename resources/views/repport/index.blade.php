@extends('layouts.app')

@section('content')
    <span>Enviados</span>
    <table class="table-custom">
        <thead>
            <tr>
                <th>Mod</th>
                <th>Denúncia</th>
                <th>Situação</th>
                <th>Resposta</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @php
                $colors = [
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                ];
            @endphp

            @foreach ($repports as $repport)
                <tr>
                    <td>{{ $repport->mod->title }}</td>
                    <td>{{ $repport->message }}</td>
                    <td class="text-{{ $colors[$repport->status] }}">{{ __('status.' . $repport->status) }}</td>
                    <td>{{ $repport->rejected_help }}</td>
                    <td><a onclick="removeRepport()" class="btn btn-warning d-flex justify-content-center"><i class="fa-solid fa-ban text-danger fw-bold fs-6"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <span>Recebidos</span>
    <table class="table-custom">
        <thead>
            <tr>
                <th>Mod</th>
                <th>Denúncia</th>
                <th>Situação</th>
                <th>Resposta</th>
            </tr>
        </thead>
        <tbody>
            @php
                $colors = [
                    'pending' => 'warning',
                    'approved' => 'success',
                    'rejected' => 'danger',
                ];
            @endphp

            @foreach ($receivedRepports as $repport)
                <tr>
                    <td>{{ $repport->mod->title }}</td>
                    <td>{{ $repport->message }}</td>
                    <td class="text-{{ $colors[$repport->status] }}">{{ __('status.' . $repport->status) }}</td>
                    <td>{{ $repport->rejected_help }}</td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
   @isset($repport)
        <form action="{{ route('repport.delete', $repport->id) }}" method="POST" id="form-repport-id">
            @csrf
            @method('DELETE')
        </form>
   @endisset
@endsection
@section('javascript')
    <script>
        function removeRepport() {
            if(confirm('Tem certeza que deseja remover a denúncia?')) {
                $('#form-repport-id').submit();
            }
        }
    </script>
@endsection