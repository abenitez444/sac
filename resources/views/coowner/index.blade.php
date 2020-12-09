
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta')
@section('card-button')
<div class="d-none d-sm-inline-block btn-icon-split">
    <span class="btn btn-deep-orange" id="btn-newCo-owner" data-toggle="modal" data-target="#modal-createCo-owner"> <i class="fas fa-plus fa-lg text-white font-weight-bold" title="Registrar Copropetario."></i>
     </span>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header info-color-dark">
    <h6 class="font-weight-bold text-white"><i class="fas fa-fw fa-users fa-lg" title="Registrar Copropetario."></i> LISTA DE COPROPETARIOS</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="co-ownerTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Nombres</b></th>
            <th><b>Residencia</b></th>
            <th><b>Tipo</b></th>
            <th><b>Estructura</b></th>
            <th><b>N°/Letra</b></th>
            <th><b>Teléfonos</b></th>
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($coowner as $owner)
          <tr class="text-center">
            <td>{{$owner->name}}</td>
            <td>{{$owner->nameResidence->name_residence}}</td>
            @if($owner->type_residence_id == 1)
            <td>Apartamento</td>
            @elseif($owner->type_residence_id == 2)
            <td>Thownhouse</td>
            @else
            <td>Casa</td>
            @endif
          
            @if($owner->type_structure_id == 1 )
              <td>Central</td> 
            @endif
            @if($owner->type_structure_id == 2 )
              <td>Esquina</td> 
            @endif
            @if($owner->type_structure_id ==  3 )
              <td>Pen House</td> 
            @endif
            @if($owner->type_structure_id != 1 && $owner->type_structure_id != 2 && $owner->type_structure_id != 3 )
              <td>{{$owner->type_structure_id}}</td> 
            @endif

            <td>{{$owner->number_letters}}</td>

            @if($owner->code_phone_id && $owner->phone)
            <td>{{$owner->CodePhone->option}}{{$owner->phone}}</td> 
            @else 
            <td>No disponible</td>
            @endif
            <td>
              <a href="detail/{{$owner->id}}" title="Visualizar" id="btn-detailCoowner" data-toggle="modal" data-target="#modal-detailCoowner" data-whatever="{{$owner->id}}">
                <b class="text-dark fa fa-eye"></b>
              </a>
              <a href="edit/{{$owner->id}}" title="Editar" data-toggle="modal" data-target="#modal-editCoowner" data-whatever="{{$owner->id}}">
                <b class="text-dark fa fa-edit"></b>
              </a>
              <a href="#" class="dark-grey-text" title="Eliminar" onclick="deletedEmployee('{{$owner->id}}')">
                <b class="text-dark fa fa-trash"></b>
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
@include('coowner.edit')
@include('coowner.detail')
@endsection

@section('js')

<script src="{{ asset('js/selectDependent.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/Spanish.json') }}"></script>
<script>
  //Mask Jquery Aliquot
$(document).ready(function(){
  $('.aliquot').mask('09,909.099.099');
});
</script>

<script>
  //Register employee in modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#co-ownerTable').DataTable();

    $('#send-co-owner').click(function(e){
      var data = $("#co-owner-form").serialize();
      $.ajax({
        url: '{{ route('co-owner.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        $('#modal-createCo-owner').modal('hide')
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
          title: "No se realizo el registro del copropetario.!",
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
<!--Edit of co-owner in modal -->
<script>
    //Edit employee in modal 
    $("#modal-editResidence").appendTo("body");
      $('#modal-editCoowner').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever')  
      if(id){

        $.ajax({
          url: '{{ url('/co-owner/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
        }).done(function(data) {
          console.log(data)
          modal.find('.modal-title').html('').append('<span class="font-weight-bold"><i class="fa fa-users text-white fa-lg mt-1" title="Editar Copropetario."></i> Editar Copropietario </span>')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name').val(data.name)
          modal.find('.modal-body #name_residence_id').val(data.name_residence_id)
          modal.find('.modal-body #type_residence_id').val(data.type_residence_id)
          modal.find('.modal-body #type_structure_id').html('')
          if (data.type_structure_id == 1) {
            modal.find('.modal-body #type_structure_id').append("<option value='1'>Central</option>");
          }
          if(data.type_structure_id == 2)  {
            modal.find('.modal-body #type_structure_id').append("<option value='2'>Esquina</option>");
          }
          if(data.type_structure_id == 3)  {
            modal.find('.modal-body #type_structure_id').append("<option value='3'>Pen House</option>");
          }
          if (data.type_structure_id != 1 && data.type_structure_id != 2 && data.type_structure_id != 3) {
           
            modal.find('.modal-body #type_structure_id').append("<option value='"+data.type_structure_id+ "'> "+data.type_structure_id+"</option>");

          }
          modal.find('.modal-body #number_letters').val(data.number_letters)
          modal.find('.modal-body #code_phone_id').val(data.code_phone_id)
          modal.find('.modal-body #phone').val(data.phone)
          modal.find('.modal-body #email').val(data.email)
      
          //Edit Co-owner and save form
          $('#send-editCoowner').click(function(e){
            var data = $("#editCoowner-form").serialize();
            $.ajax({
              url: '{{ route('co-owner.store') }}',
              type: 'POST',
              dataType: 'json',
              data: data,
              //Success
            }).done(function() {
              $('#modal-editCoowner').modal('hide')
              Swal.fire({
                icon: 'success',
                title: "¡Solicitud de Copropetario se guardó exitosamente!",
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
                title: "No se realizo el registro del Copropetario!",
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
      }
    })
</script>
<!--Details of empleado in modal -->
<script>
  $('#modal-detailCoowner').on('show.bs.modal', function (event) {
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
          modal.find('.modal-title').html('').append('<span class="font-weight-bold"><i class="fas fa-user-tag text-white fa-md mt-1"></i> Detalle Copropietario </span>')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name').text(data.name)
          modal.find('.modal-body #name_residence_id').text(data.name_residence.name_residence)
          if (data.type_residence_id == 1) {
            modal.find('.modal-body #type_residence_id').text('Apartamento')
          }
          if (data.type_residence_id == 2) {
            modal.find('.modal-body #type_residence_id').text('Thownhouse')
          }
          if (data.type_residence_id == 3) {
            modal.find('.modal-body #type_residence_id').text('Casa')
          }
          if (data.type_structure_id == 1) {
            modal.find('.modal-body #type_structure_id').text('Central')
          }
          if (data.type_structure_id == 2) {
            modal.find('.modal-body #type_structure_id').text('Esquina')
          }
          if (data.type_structure_id == 3) {
            modal.find('.modal-body #type_structure_id').text('Pen House')
          }
          if (data.type_structure_id != 1 && data.type_structure_id != 2 && data.type_structure_id != 3) {
            modal.find('.modal-body #type_structure_id').text(data.type_structure_id)
          }

          modal.find('.modal-body #number_letters').text(data.number_letters)
          
          if (data.code_phone_id != null && data.phone != null) {
            modal.find('.modal-body #code_phone_id').text(data.code_phone.option)
            modal.find('.modal-body #phone').text(data.phone)
          }else{
            modal.find('.modal-body #code_phone_id').text('No disponible')
          }
        
          if (data.email != null) {
            modal.find('.modal-body #email').text(data.email)
          }else{
            modal.find('.modal-body #email').text('No disponible')
          }
         
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

