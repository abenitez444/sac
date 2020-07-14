
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta')
@section('card-button')
<div class="d-none d-sm-inline-block ">
  <a href="#" class="btn btn-success btn-icon-split btn-sm" id="btn-newCo-owner" data-toggle="modal" data-target="#modal-createCo-owner">
    <span class="icon text-white-50">
      <i class="fas fa-plus font-weight-bold"></i>
    </span>
    <span class="text font-weight-bold"> Registrar copropetario</span>
  </a>
</div>
@endsection

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
            <th><b>Nombre y apellido</b></th>
            <th><b>Alícuota</b></th>
            <th><b>Saldo</b></th>
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

@include('coowner.store')
@include('coowner.detail')
@endsection

@section('js')
<script type="text/javascript">
  //Register employee in modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#co-ownerTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
    });

    $('#send-co-owner').click(function(e){
      var data = $("#co-owner-form").serialize();
      $.ajax({
        url: '{{ route('co-owner.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        $('#modal-createEmployee').modal('hide')
        Swal.fire({
          icon: 'success',
          title: "¡Solicitud de copropetario se guardó exitosamente!",
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
      $('#modal-createCo-owner').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/co-owner/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name').val(data.name)
          modal.find('.modal-body #aliquot').val(data.aliquot)
          modal.find('.modal-body #saldo').val(data.saldo)
          modal.find('.modal-body #code_phone_id').val(data.code_phone_id)
          modal.find('.modal-body #phone').val(data.phone)
          modal.find('.modal-body #email').val(data.email)
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
  })
</script>
<!--Details of empleado in modal -->
<script>
  $('#modal-detailCo-owner').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/co-owner/detail') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text(' Perfil de empleado ')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #avatar').val(data.avatar)
          modal.find('.modal-body #name').text(data.name)
          if(data.document_type){
            modal.find('.modal-body #document_type_id').text(data.document_type.option)
          }else{
            modal.find('.modal-body #document_type_id').text('')
          }
          if(data.ci){
            modal.find('.modal-body #ci').text(data.ci)
          }else{
            modal.find('.modal-body #ci').text('No disponible')
          }
          if(data.code_phone){
            modal.find('.modal-body #code_phone_id').text(data.code_phone.option)
          }else{
            modal.find('.modal-body #code_phone_id').text('')
          }
          if(data.phone){
            modal.find('.modal-body #phone').text(data.phone)
          }else{
            modal.find('.modal-body #phone').text('No disponible')
          }
          if(data.email){
            modal.find('.modal-body #email').text(data.email)
          }else{
            modal.find('.modal-body #email').text('No disponible')
          }
            modal.find('.modal-body #cv').val(data.curriculum)
        })
        .fail(function() {
          console.log("error");
        });
      }
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
    text: "¡Deseas eliminar este copropietario!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '{{ route('co-owner.deleted') }}',
        type: 'PUT',
        data: {
        _token: '{{ csrf_token() }}',
        id: id
      }
        }).done(function(id) {
        Swal.fire({
          icon: 'success',
          title: "¡Copropietario eliminado exitosamente!",
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
        text: 'El copropetario no fue eliminado',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    }
  })
}
</script>

@endsection



