@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-7">
            @if(session()->has('message'))
                <div class="alert alert-success mb-3">{{ session()->get('message') }}</div>
            @endif

            <div class="card shadow border-0">

                <div class="card-header border-0">Modificar Dispositvo</div>



                <div class="card-body">

                    <form action="{{ url('esps/'. $esp->id . '/update') }}" method="post" class="row">

                        @csrf

                        <div class="col-md-6 form-group mb-3">

                            <label for="name">Nombre del Dispositivo</label>

                            <input type="text" class="form-control" name="name" required value="{{$esp->name}}">

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="email">Usuario</label>

                            <select class="form-control" name="email">

                                <option value="">{{$esp->users->count() > 0 ? $esp->users->first()->name : 'N/A'}}</option>

                                @foreach ($users as $user)

                                    <option value="{{$user->email}}">{{$user->email}}</option>

                                @endforeach

                            </select>

                        </div>

                        

                        <div class="col-md-6 form-group mb-3">

                            <label for="plan">Plan</label>

                            <select class="form-control" name="plan" required>

                                <option value="{{$esp->plan}}">{{$esp->plan}}</option>

                                <option value="Plus Basic">Plus Basic</option>

                                <option value="Plus Master">Plus Master</option>

                            </select>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="high">Altura</label>

                            <input type="number" class="form-control" step="any" required name="high" value="{{$esp->high}}"/>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="volume">Volumen</label>

                            <input type="number" class="form-control" step="any" required name="volume" value="{{$esp->volume}}"/>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="expiration_date">Fecha de Expiración:</label>

                            <input type="date" class="form-control" name="expiration_date" 

                                value="{{ $esp->expiration_date ? date_format(new \DateTime($esp->expiration_date), 'Y-m-d') : NULL }}"

                            >

                        </div>



                        <div class="col-md-12 my-3">

                            <h6>Asignación de Dispositivo a Usuario</h6>

                            <hr>

                        </div>



                        <div class="col-md-6 form-group mb-3">

                            <label for="alias">Alias</label>

                            <input type="text" class="form-control" name="alias" value="@if($esp->users->count() > 0){{ $esp->users->first()->pivot->alias}}@endif" required>

                        </div>

                        <div class="col-md-6 form-group mb-3">

                            <label for="role">Role</label>

                            <select class="form-control" name="role">

                                <option value="@if($esp->users->count() > 0){{$esp->users->first()->role}}@endif">@if($esp->users->count() > 0){{$esp->users->first()->pivot->role == 'Administrador' ? $esp->users->first()->role : 'Usuario'}}@endif</option>

                                <option value="">Solo Lectura</option>

                                <option value="Administrador">Administrador</option>

                            </select>

                        </div>

                        <div class="col-md-12 form-group mb-3">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" 

                                    value="Sí" 

                                    id="flexCheckChecked" 

                                    name="main" 

                                    @if($esp->users->count() > 0)

                                        @if($esp->users->first()->pivot->main)

                                            checked 

                                        @endif

                                    @endif

                                />

                                <label class="form-check-label" for="flexCheckChecked">

                                  Establecer como Dispositivo Principal

                                </label>

                            </div>

                        </div>



                        <div class="col-md-12 form-group">

                            <input type="submit" class="btn btn-dark w-100" value="Registrar Dispositivo">

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection