
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
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
      <table id="employeeTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Avatar</b></th>
            <th><b>Nombre y apellido</b></th>
            <th><b>Cédula de identidad</b></th>
            <th><b>Teléfono</b></th>
            <th><b>Correo electrónico</b></th>
            <!--<th><b>Sintesis curricular</b></th>-->
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($employee as $emp)
          <tr class="text-center">
            <td><img src="{{asset('img/avatar.png')}}" alt="Avatar" style="width: 35px; border-radius: 50px;"></td> 
            <td>{{$emp->name}}</td>
            @isset($emp->DocumentType)
             <td>{{$emp->DocumentType->option}}-{{$emp->ci}}</td>
            @else
             <td></td>
            @endisset
            <td>{{$emp->phone}}</td> 
            <td>{{$emp->email}}</td>
            <!--<td>{{$emp->curriculum}}</td>-->
            <td>
              <a href="detail/{{$emp->id}}" class="icono" title="Visualizar" id="btn-detailEmployee" data-toggle="modal" data-target="#modal-detailEmployee" data-whatever="{{$emp->id}}">
                <b class="radiusV fa fa-eye"></b>
              </a>
              <a href="#" class="icono" title="Editar" data-toggle="modal" data-target="#modal-createEmployee" data-whatever="{{$emp->id}}">
                <b class="radiusM fa fa-edit"></b>
              </a>
              <a href="#" class="icono" title="Eliminar" onclick="deletedEmployee('{{$emp->id}}')">
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

@include('employee.store')
@include('employee.detail')
@endsection

@section('js')

<script type="text/javascript">
  //Register employee in modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#employeeTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
    });

    $('#send-employee').click(function(e){
      var data = $("#employee-form").serialize();
      $.ajax({
        url: '{{ route('employee.save') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        $('#modal-createEmployee').modal('hide')
        Swal.fire({
          icon: 'success',
          title: "¡Solicitud de empleado se guardó exitosamente!",
          showConfirmButton: true,
          timer: 3000
        }).then((result) => {
          if (result.value){
            location.reload()
          }
        })
        //Error
      }).fail(function(msj) {
        Swal.fire({
          icon: 'error',
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
    //Edit employee in modal 
      $('#modal-createEmployee').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/employee/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text(' Editar empleado:' + data.name)
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #avatar').val(data.avatar)
          modal.find('.modal-body #name').val(data.name)
          modal.find('.modal-body #nac').val(data.document_type_id)
          modal.find('.modal-body #ci').val(data.ci)
          modal.find('.modal-body #tlf').val(data.phone)
          modal.find('.modal-body #mail').val(data.email)
          modal.find('.modal-body #cv').val(data.curriculum)
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
  })
</script>
<!--Delete empleado -->
<script>
  function deletedEmployee (id){

  const swalWithBootstrapButtons = Swal.mixin({
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: '¿Estas Seguro?',
    text: "¡Deseas eliminar este empleado!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '{{ route('employee.deleted') }}',
        type: 'PUT',
        data: {
        _token: '{{ csrf_token() }}',
        id: id
      }
        }).done(function(id) {
        Swal.fire({
          icon: 'success',
          title: "Empleado eliminado exitosamente!",
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
          title: "No se realizo el registro!",
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
        text: 'El empleado no fue eliminado',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    }
  })
}
</script>
<!--Details of empleado in modal -->
<script>
  $('#modal-detailEmployee').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/employee/detail') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text(' Perfil de empleado ')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #avatar').val(data.avatar)
          modal.find('.modal-body #name').text(data.name)
          if(data.document_type){
            modal.find('.modal-body #nac').text(data.document_type.option)
          }
          else{
             modal.find('.modal-body #nac').text('')
          }

          modal.find('.modal-body #ci').text(data.ci)
          modal.find('.modal-body #tlf').text(data.phone)
          modal.find('.modal-body #mail').text(data.email)
          modal.find('.modal-body #cv').val(data.curriculum)
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
</script>

@endsection


