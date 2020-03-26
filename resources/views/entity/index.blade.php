
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta de Entes')
@section('card-button')
<div class="d-none d-sm-inline-block">
  <a href="#" class="btn btn-success btn-icon-split btn-sm" id="btn-newEntity" data-toggle="modal" data-target="#modal-createEntity">
    <span class="icon text-white-50">
      <i class="fas fa-plus font-weight-bold mt-1"></i>
    </span>
    <span class="text font-weight-bold"> Registrar ente</span>
  </a>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-primary">
    <h5 class="font-weight-bold text-white">Lista de ente</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="entityTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Nombre de ente</b></th>
            <th><b>Identificación</b></th>
            <th><b>Correo electrónico</b></th>
            <th><b>Página web</b></th>
            <th><b>Dirección</b></th>
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($entity as $ent)
          <tr class="text-center">
             <td>{{$ent->name}}</td> 
            @isset($ent->document_type_id)
             <td>{{$ent->Type->option}}-{{$ent->identity}}</td>
            @else
             <td>No disponible</td>
            @endisset

            @isset($ent->email)
             <td>{{$ent->email}}</td>
            @else
             <td>No disponible</td>
            @endisset

            @isset($ent->web)
             <td>{{$ent->web}}</td>
            @else
             <td>No disponible</td>
            @endif

            @isset($ent->addres)
             <td>{{$ent->addres}}</td>
            @else
             <td>No disponible</td>
            @endisset
             <td>
              <a href="detail/{{$ent->id}}" class="icono" title="Visualizar" id="btn-detailEntity" data-toggle="modal" data-target="#modal-detailEntity" data-whatever="{{$ent->id}}">
                <b class="radiusV fa fa-eye"></b>
              </a>
              <a href="#" class="icono" title="Editar" data-toggle="modal" data-target="#modal-createEntity" data-whatever="{{$ent->id}}">
                <b class="radiusM fa fa-edit"></b>
              </a>
              <a href="#" class="icono" title="Eliminar" onclick="deletedEntity('{{$ent->id}}')">
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

@include('entity.store')

@endsection

@include('entity.detail')

@section('js')

<script type="text/javascript">
  //Register entity in modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#entityTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
    });

    $('#send-entity').click(function(e){
      var data = $("#entity-form").serialize();
      $.ajax({
        url: '{{ route('entity.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        $('#modal-createEntity').modal('hide')
        Swal.fire({
          icon: 'success',
          title: "¡Solicitud de ente se guardó exitosamente!",
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
          title: "No se realizo el registro del ente!",
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
    //Edit entity in modal 
      $('#modal-createEntity').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/entity/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name').val(data.name)
          modal.find('.modal-body #document_type_id').val(data.document_type_id)
          modal.find('.modal-body #identity').val(data.identity)
          modal.find('.modal-body #email').val(data.email)
          modal.find('.modal-body #web').val(data.web)
          modal.find('.modal-body #addres').val(data.addres)
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
  })
</script>
<!--Details of entity in modal -->
<script>
  $('#modal-detailEntity').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      if(id){

        $.ajax({
          url: '{{ url('/entity/detail') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-title').text(' Detalle de ente ')
          modal.find('.modal-body #id').text(data.id)
          modal.find('.modal-body #name').text(data.name)
          if(data.document_type_id){
            modal.find('.modal-body #document_type_id').text(data.type.option)
          }else{
            modal.find('.modal-body #document_type_id').text('')
          }
          if(data.identity){
            modal.find('.modal-body #identity').text(data.identity)
          }else{
            modal.find('.modal-body #identity').text('No disponible')
          }
          if(data.email){
            modal.find('.modal-body #email').text(data.email)
          }else{
            modal.find('.modal-body #email').text('No disponible')
          }
          if(data.web){
            modal.find('.modal-body #web').text(data.web)
          }else{
            modal.find('.modal-body #web').text('No disponible')
          }
          if(data.addres){
            modal.find('.modal-body #addres').text(data.addres)
          }else{
            modal.find('.modal-body #addres').text('No disponible')
          }
         
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
</script>
<!--Delete entity-->
<script>
  function deletedEntity (id){

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
        url: '{{ url('/entity/deleted') }}',
        type: 'PUT',
        data: {
        _token: '{{ csrf_token() }}',
        id: id
      }
        }).done(function(id) {
        Swal.fire({
          icon: 'success',
          title: "Ente eliminado exitosamente!",
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
        text: 'El ente no fue eliminado',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    }
  })
}
</script>

@endsection



