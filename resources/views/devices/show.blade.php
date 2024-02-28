@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{$esp->name}}
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Identificador</th>
                                <td>{{$esp->device_id}}</td>
                            </tr>
                            <tr>
                                <th>Usuarios Asociados</th>
                                <td>
                                    @foreach($esp->users as $user)
                                        {{ $user->name }}
                                        @if($user->role == 'Administrador') 
                                            <span class="badge bg-dark">Administrador</span> 
                                        @endif
                                        <br />
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$esp->name}}</td>
                            </tr>
                            <tr>
                                <th>Alias</th>
                                <td>{{$esp->alias}}</td>
                            </tr>
                            <tr>
                                <th>Plan</th>
                                <td>{{$esp->plan}}</td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <span class="badge bg-dark">Dimensiones</span>
                                </th>
                            </tr>
                            <tr>
                                <th>Altura</th>
                                <td>{{ $esp->high }} m</td>
                            </tr>
                            <tr>
                                <th>Volumen</th>
                                <td>{{ number_format($esp->volume, 2, '.', ',') }} lts</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection