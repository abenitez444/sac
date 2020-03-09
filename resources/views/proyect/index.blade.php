
@extends('layouts.app')
@section('card-title', 'Gestion de Proyectos')
@section('card-button')
<div class="d-none d-sm-inline-block ">
  <a href="#" class="btn btn-success btn-icon-split btn-sm" id="btn-new" data-toggle="modal" data-target="#modal-createProyect">
    <span class="icon text-white-50">
      <i class="fas fa-plus font-weight-bold"></i>
    </span>
    <span class="text font-weight-bold">Registrar Proyecto</span>
  </a>
</div>
@endsection
@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Lista de proyectos</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      {!! $dataTable->table(['class' => 'table table-bordered table-hover text-center w-100'], true) !!} 
    </div>
  </div>
</div>


@include('proyect.store')
@endsection

@section('js')
<script src="/vendor/datatables/buttons.server-side.js"></script>
  {!! $dataTable->scripts() !!}
<script type="text/javascript">
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#proyectTable').DataTable();

    $('#btn-new').click(function(e){
      modal.find('.modal-title').text('Registrar proyecto')
      $('#id').val('');
      $("#proyect-form")[0].reset();
    });

    $('#send-proyect').click(function(e){
      var data = $("#proyect-form").serialize();
      $.ajax({
        url: '{{ route('proyect.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
      })
      .done(function() {
        table.ajax.reload();
        $('#modal-createProyect').modal('hide')
        Swal.fire({
          type: 'success',
          title: "¡Registro exitoso!",
          showConfirmButton: false,
          timer: 2000
        })
      })
      .fail(function() {
        Swal.fire({
          type: 'error',
          title: "No se realizo el registro!",
          showConfirmButton: false,
          timer: 2000
        })
      });
      
    })

    $('#modal-createProyect').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/proyect/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text('Editar proyecto:' + data.name)
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name').val(data.name)
          modal.find('.modal-body #status_id').val(data.status_id)
          modal.find('.modal-body #type_id').val(data.type_id)
          modal.find('.modal-body #date_start').val(data.date_start)

          table.ajax.reload();
          $('#modal-createProyect').modal('hide')
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
  })
</script>
@endsection