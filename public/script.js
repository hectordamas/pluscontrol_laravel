//Tablas
let devicesTable = $('#DevicesTable').DataTable({});
let usersTable = $('#UsersTable').DataTable({});

//Select
$("select").select2();

//Destruir Usuario
const userDestroy = async (id) => {
    await fetch(`/users/${id}/destroy`, {
        method: 'POST',
        headers: {
            "Accept": "application/json",
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    .then(res => res.json())
    .then((res) => {
        console.log(res)
        $('#row' + id).remove();
        Swal.fire({icon: 'success', title: '', text: 'Usuario eliminado con éxito!', confirmButtonText: 'Aceptar'})
    })
    .catch(e => console.log(e))
}

$('.userDestroy').on('click', function(){
    var id = $(this).data('id')
    Swal.fire({
        icon: 'question',
        title: '', 
        text: 'Estás seguro de ejecutar esta acción?', 
        confirmButtonText: 'Aceptar', 
        cancelButtonText: "Cancelar",
        showCancelButton: true,
    }).then((result) => {
        if(result.isConfirmed){
            userDestroy(id);
        }
    })
})

//Destruir Dispositivo
const espDestroy = async (id) => {
    await fetch(`/esps/${id}/destroy`, {
        method: 'POST',
        headers: {
            "Accept": "application/json",
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    .then(res => res.json())
    .then((res) => {
        console.log(res)
        $('#row' + id).remove();
        Swal.fire({icon: 'success', title: '', text: 'Dispositivo eliminado con éxito!', confirmButtonText: 'Aceptar'})
    })
    .catch(e => console.log(e))
}


$('.espDestroy').on('click', function(){
    var id = $(this).data('id')
    Swal.fire({
        icon: 'question',
        title: '', 
        text: 'Estás seguro de ejecutar esta acción?', 
        confirmButtonText: 'Aceptar', 
        cancelButtonText: "Cancelar",
        showCancelButton: true,
    }).then((result) => {
        if(result.isConfirmed){
            espDestroy(id);
        }
    })
})