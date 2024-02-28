@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{$user->name}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$user->name}}</td>
                            </tr>
                            <tr>
                                <th>Cédula de Identidad</th>
                                <td>{{ $user->identification_card }}</td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Dirección</th>
                                <td>{{ $user->adress }}</td>
                            </tr>
                            <tr>
                                <th>Dispositivos</th>
                                <td>
                                    @foreach($user->esps as $esp)
                                        {{$esp->name}} 
                                        @if($esp->pivot->main)
                                            <span class="badge bg-success">Predeterminado</span>
                                        @endif
                                        <br />
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection