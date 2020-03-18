
@extends('layouts.app')
@section('card-title', 'Consulta del inventario')
@section('card-subtitle', '')
@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Tabla de Inventario</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      {!! $dataTable->table(['class' => 'table table-bordered table-hover text-center w-100'], true) !!} 
    </div>
  </div>
</div>
@endsection
@include('inventory.detail')

@section('js')
<script src="/vendor/datatables/buttons.server-side.js"></script>
	{!! $dataTable->scripts() !!}

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
@endsection