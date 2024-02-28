@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow">
                <div class="card-header">
                    Todos los Usuarios
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="UsersTable">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>E-Mail</th>
                                <th>Nombre</th>
                                <th>Rol:</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr id="row{{ $user->id }}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn btn-success btn-sm">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm userDestroy" data-id="{{ $user->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                        <a href="{{ url('/users/' . $user->id . '/show') }}" class="btn btn-dark btn-sm">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

