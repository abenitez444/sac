
@extends('layouts.app')
@section('card-title', 'Consulta del inventario')
@section('card-subtitle', '')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-gradient-info">
    <h6 class="font-weight-bold text-white"><i class="fas fa-fw fa-users fa-lg" title="Registrar Copropetario."></i> LISTA DE COPROPETARIOS</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="co-ownerTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Nombre residencia</b></th>
            <th><b>Tipo vivienda</b></th>
            <th><b>Tipo estructura</b></th>
            <th><b>Número/letra</b></th>
            <th><b>Nombre propietario</b></th>
            <th><b>Teléfonos</b></th>
            <th><b>Correo electrónico</b></th>
            <!--<th><b>Sintesis curricular</b></th>-->
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coowner as $owner)
          <tr class="text-center">
            <td>{{$owner->name}}</td>
            <td>{{$owner->aliquot}}</td>
            <td>{{$owner->saldo}}</td>

           @isset($owner->phone)
            <td>({{$owner->CodePhone->option}})-{{$owner->phone}}</td> 
           @else 
            <td>No disponible</td>
           @endisset

           @isset($owner->email)
            <td>{{$owner->email}}</td>
           @else
            <td>No disponible</td>
           @endisset
            <!--<td>{{$owner->curriculum}}</td>-->
            <td>
              <a href="detail/{{$owner->id}}" class="icono" title="Visualizar" id="btn-detailCo-owner" data-toggle="modal" data-target="#modal-detailCo-owner" data-whatever="{{$owner->id}}">
                <b class="radiusV fa fa-eye"></b>
              </a>
              <a href="#" class="icono" title="Editar" data-toggle="modal" data-target="#modal-createCo-owner" data-whatever="{{$owner->id}}">
                <b class="radiusM fa fa-edit"></b>
              </a>
              <a href="#" class="icono" title="Eliminar" onclick="deletedEmployee('{{$owner->id}}')">
                <b class="radiusM fa fa-trash"></b>
              </a>
            </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>    
  </div>
</div>

@include('inventory.detail')
@endsection

@section('js')
<script src="/vendor/datatables/buttons.server-side.js"></script>


<!--Details of inventory in modal -->
<script>
  $('#modal-detailInventory').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/inventory/detail') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text(' Detalle de inventario')
          modal.find('.modal-body #id').text(data.id)
          modal.find('.modal-body #entity_id').text(data.entity.name)
          modal.find('.modal-body #dependencia').text(data.dependencia)
          modal.find('.modal-body #ubicacion').text(data.ubicacion)
          modal.find('.modal-body #responsable').text(data.responsable)
          modal.find('.modal-body #codigo_interno').text(data.codigo_interno)
          modal.find('.modal-body #descripcion').text(data.descripcion)
          modal.find('.modal-body #serial').text(data.serial)
          modal.find('.modal-body #marca').text(data.marca)
          modal.find('.modal-body #modelo').text(data.modelo)
          modal.find('.modal-body #cantidad').text(data.cantidad)
          modal.find('.modal-body #especificacion').text(data.especificacion)
          modal.find('.modal-body #detalle').text(data.detalle)
        
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
</script>
<!--Delete Inventory -->
<script>
  function deletedInventory (id){

  const swalWithBootstrapButtons = Swal.mixin({
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: '¿Estas Seguro?',
    text: "¡Deseas eliminar este inventario!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '{{ url('/inventory/deleted') }}',
        type: 'PUT',
        data: {
        _token: '{{ csrf_token() }}',
        id: id
      }
        }).done(function(id) {
        Swal.fire({
          icon: 'success',
          title: "Inventario eliminado exitosamente.",
          showConfirmButton: true,
          timer: 3000
        }).then((result) => {
          if (result.value){
            location.reload()
          }
        })
        //Errors
        }).fail(function(msj) {
          Swal.fire({
            icon: 'error',
            title: "No se eliminó el inventario.!",
            showConfirmButton: false,
            timer: 2000
          })
        })
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire({
        title: 'Cancelado',
        text: 'El inventario no fue eliminado.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    }
  })
}
</script>
@endsection