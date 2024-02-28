@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow border-0">
                <div class="card-header">Lista de Dispositvos</div>

                <div class="card-body">
                    <div class="col-md-12">
                        <form action="{{ url('esps/renew') }}" class="row mb-3" method="post" id="renew_form" name="renew_form">
                            @csrf                    
                            <div class="col-md-3 d-flex">
                                <input type="date" class="form-control rounded-0" name="expiration_date">
                                <button type="submit" class="btn btn-dark btn-sm rounded-0">Renovar</button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-sm table-striped" id="DevicesTable">
                        <thead class="table-dark">
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Expiracion</th>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Pago</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($esps as $esp)
                                <tr id="row{{ $esp->id }}">
                                    <td>
                                        <input type="checkbox" id="device-{{ $esp->id }}" form="renew_form" name="devices[]" value="{{ $esp->id }}">
                                    </td>
                                    <td>{!! $esp->expiration_date ? date_format(new DateTime($esp->expiration_date), 'Y-m-d') : '<strong class="text-danger">0000-00-00</strong>' !!}</td>
                                    <td>{{$esp->name}}</td>
                                    <td>
                                        @if($esp->state == 'Online')
                                            <span class="text-success">{{ $esp->state }}</span>
                                        @else
                                            <span class="text-danger">{{ $esp->state }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $esp->paymentStatus == 'Verde' )
                                            <span class="badge bg-success">Pagado</span>
                                        @elseif( $esp->paymentStatus == 'Amarillo' )
                                            <span class="badge bg-warning">Próximo a vencerse</span>
                                        @else
                                            <span class="badge bg-danger">Vencido</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/esps/' . $esp->id . '/edit') }}" class="btn btn-sm btn-success">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ url('/esps/' . $esp->id . '/show') }}" class="btn btn-sm btn-dark">
                                            <i class="fas fa-info"></i>                                        
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger espDestroy" data-id="{{ $esp->id }}">
                                            <i class="fa-solid fa-trash"></i>
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

<script>
    document.getElementById('select-all').addEventListener('click', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>

@endsection

