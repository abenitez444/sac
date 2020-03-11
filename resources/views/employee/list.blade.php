
@extends('layouts.app')
@section('card-title', 'Consulta de Personal')
@section('card-button')
<div class="d-none d-sm-inline-block ">
  <a href="#" class="btn btn-success btn-icon-split btn-sm" id="btn-newEmployee" data-toggle="modal" data-target="#modal-createEmployee">
    <span class="icon text-white-50">
      <i class="fas fa-plus font-weight-bold"></i>
    </span>
    <span class="text font-weight-bold"> Registrar empleado</span>
  </a>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Lista de personal</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
    
    </div>
  </div>
</div>
@include('employee.store')
@endsection

@section('js')
<script src="/vendor/datatables/buttons.server-side.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#employeeTable').DataTable();

    $('#btn-newEmployee').click(function(e){
      modal.find('.modal-title').text('Registrar empleado')
      $('#id').val('');
      $("#employee-form")[0].reset();
    });

    $('#send-employee').click(function(e){
      var data = $("#employee-form").serialize();
      $.ajax({
        url: '{{ route('employee.save') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
      }).done(function() {
        table.ajax.reload();
        $('#modal-createEmployee').modal('hide')
        Swal.fire({
          type: 'success',
          title: "¡Empleado registrado exitosamente!",
          showConfirmButton: false,
          timer: 2000
        })
      }).fail(function(msj) {
        Swal.fire({
          type: 'error',
          title: "No se realizo el registro del empleado!",
          showConfirmButton: false,
          timer: 2000
        })
        var errors = $.parseJSON(msj.responseText);

        $.each(errors.errors, function(key, value) 
        {
            $("#" + key + "_group").addClass("has-error");
            $("." + key + "_span").addClass("help-block text-danger").html(value);
            toastr.error(value,"<h5>"+"<b style='color:#FFF400;'>* </b>" + "Campo obligatorio"+"</h5>");
        });

      });
      
    })
  })
</script>
@endsection



