
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">

@endsection
@section('card-title', 'Consulta de Residencias')
@section('card-button')
<div class="d-none d-sm-inline-block">
  <a href="#" class="btn aqua-gradient btn-rounded" id="btn-newResidence" data-toggle="modal" data-target="#modal-createResidence">
    <span class="icon text-white-50">
      <i class="fas fa-plus text-white font-weight-bold mt-1" title="Registrar Residencia."></i>
    </span>
    <span class="text font-weight-bold"></span>
  </a>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header blue-gradient">
    <h5 class="font-weight-bold text-white">Lista de residencias</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="residenceTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Residencia</b></th>
            <th><b>Tipo</b></th>
            <th><b>Estructura</b></th>
            <th><b>RIF</b></th>
            <th><b>Correo electrónico</b></th>
            <th><b>Dirección</b></th>
            <th><b>Opciones</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach($residence as $res)
          <tr class="text-center">
            <td>{{$res->name_residence}}</td> 
             <td>
              @if($res->type_residence == 1) Apartamento @endif
              @if($res->type_residence == 2) Thownhouse @endif
              @if($res->type_residence == 3) Casa @endif
              @if($res->type_residence == '') No disponible @endif
             </td>

             <td> 
              @if($res->type_center == '' && $res->type_corner == '' && $res->type_penhouse == '' && $res->type_structure == '')
               No disponible
              @else
                @if($res->type_center == 'on' || $res->aliquot_center != null) Central - ({{$res->aliquot_center}}%) <br>  @endif 
                @if($res->type_corner == 'on' || $res->aliquot_corner != null) Esquina - ({{$res->aliquot_corner}}%)<br>  @endif
                @if($res->type_penhouse == 'on' || $res->aliquot_penhouse != null) Pen House  - ({{$res->aliquot_penhouse}}%)<br> @endif
                @if($res->type_structure == 'on' && $res->structure != '' || $res->aliquot_structure) {{$res->structure}} - ({{$res->aliquot_structure}}%) <br> @endif
              @endif
             </td>

             <td>
              @if($res->type_rif != '' && $res->number_rif != '')  
              {{$res->type_rif}}{{$res->number_rif}}
              @else
              No disponible
              @endif
             </td>

              @isset($res->email_residence)
               <td>{{$res->email_residence}}</td>
              @else
               <td>No disponible</td>
              @endisset

              @isset($res->addres)
               <td>{{$res->addres}}</td>
              @else
               <td>No disponible</td>
              @endisset
             <td class="text-center mb-2">
              <a href="detail/{{$res->id}}" class="" title="Visualizar" id="btn-detailResidence" data-toggle="modal" data-target="#modal-detailResidence" data-whatever="{{$res->id}}">
                <b class=" fa fa-eye"></b>
              </a>
              <a href="edit/{{$res->id}}" class="" title="Editar" id="btn-editResidence" data-toggle="modal" data-target="#modal-editResidence" data-whatever="{{$res->id}}">
                <b class=" fa fa-edit"></b>
              </a>
              <a href="#" class="" title="Eliminar" onclick="deletedResidence('{{$res->id}}')">
                <b class=" fa fa-trash icon-danger"></b>
              </a>
            </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>    
  </div>
</div>

@include('residence.store')
@include('residence.edit')
@include('residence.detail')
@endsection

@section('js')
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script>
  $(document).ready(function(){
  $('.aliquot').mask('0.990909909');
});
</script>
</script>
<script src="{{ asset('js/Spanish.json') }}"></script>
<!-- Swichet Type Estructure -->
<script>
    $('.checkbox-input').change(function(event) {

        if ($('input:checkbox[name='+event.target.name+']:checked').val() == 'on') {
            $('#form-'+event.target.name).removeClass('m-hidden');
        }
        else{
            $('#form-'+event.target.name).addClass('m-hidden');
        }
    });

</script>

<script type="text/javascript">
  //Register Residence in Modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#residenceTable').DataTable();

    $('#send-residence').click(function(e){
      var data = $("#residence-form").serialize();
      $.ajax({
        url: '{{ route('residence.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        $('#modal-createResidence').modal('hide')
        Swal.fire({
          icon: 'success',
          title: "¡Solicitud de residencia se guardó exitosamente!",
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
          title: "No se realizo el registro de la residencia!",
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
    $('#close').click(function(){
        location.reload()
    });
    $(document).keyup(function(e) {
      if (e.key === "Escape") {
        location.reload() 
      }
    });
  })
</script>
<script>
   //Edit residence in modal 
    $("#modal-editResidence").appendTo("body");
      $('#modal-editResidence').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever')  
      if(id){

        $.ajax({
          url: '{{ url('/residence/edit') }}/'+id,
          type: 'GET',
          dataType: 'json',
         
        }).done(function(data) {
          modal.find('.modal-title')
          modal.find('.modal-body #id').val(data.id)
          modal.find('.modal-body #name_residence').val(data.name_residence)
          modal.find('.modal-body #type_residence').val(data.type_residence)
          
          if(data.type_center === 'on' && data.aliquot_center != ''){
            modal.find('.modal-body #type_center').prop('checked', true);
             
            if(data.type_center === 'on' ){
              modal.find('.modal-body #aliquot_center').removeClass('m-hidden');
              modal.find('.modal-body #aliquot_center').val(data.aliquot_center);
            }
          }else{
             modal.find('.modal-body #aliquot_center').addClass('m-hidden');
             modal.find('.modal-body #type_center').prop('checked', false);
          }
          if(data.type_corner === 'on'){
            modal.find('.modal-body #type_corner').prop('checked', true);
             
            if(data.aliquot_corner != ''){
              modal.find('.modal-body #aliquot_corner').removeClass('m-hidden');
              modal.find('.modal-body #aliquot_corner').val(data.aliquot_corner);
            }
          }else{
             modal.find('.modal-body #aliquot_center').addClass('m-hidden');
             modal.find('.modal-body #type_corner').prop('checked', false);
          }
          if(data.type_penhouse === 'on'){
            modal.find('.modal-body #type_penhouse').prop('checked', true);
             
            if(data.aliquot_penhouse != ''){
              modal.find('.modal-body #aliquot_penhouse').removeClass('m-hidden');
              modal.find('.modal-body #aliquot_penhouse').val(data.aliquot_penhouse);
            }
          }else{
             modal.find('.modal-body #aliquot_penhouse').addClass('m-hidden');
             modal.find('.modal-body #type_penhouse').prop('checked', false);
          }
          if(data.type_structure === 'on'){
            modal.find('.modal-body #type_structure').prop('checked', true);
             
            if(data.structure != '' && data.aliquot_structure != ''){
              modal.find('.modal-body #structure').removeClass('m-hidden');
              modal.find('.modal-body #aliquot_structure').removeClass('m-hidden');
              modal.find('.modal-body #structure').val(data.structure)
              modal.find('.modal-body #aliquot_structure').val(data.aliquot_structure)
            }
          }else{
             modal.find('.modal-body #structure').addClass('m-hidden');
             modal.find('.modal-body #type_structure').prop('checked', false);
          }
          modal.find('.modal-body #type_rif').val(data.type_rif)
          modal.find('.modal-body #number_rif').val(data.number_rif)
          modal.find('.modal-body #email_residence').val(data.email_residence)
          modal.find('.modal-body #addres').val(data.addres)
         //Edit and save form
          $('#send-editResidence').click(function(e){
            var data = $("#editResidence-form").serialize();
            $.ajax({
              url: '{{ route('residence.store') }}',
              type: 'POST',
              dataType: 'json',
              data: data,
              //Success
            }).done(function() {
              $('#modal-editResidence').modal('hide')
              Swal.fire({
                icon: 'success',
                title: "¡Solicitud de residencia se guardó exitosamente!",
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
                title: "No se realizo el registro de la residencia!",
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
        .fail(function() {
          console.log("error");
        });
         $('#closeEdit').click(function(){
            location.reload()
        });
        $(document).keyup(function(e) {
          if (e.key === "Escape") {
            location.reload() 
          }
        });
      }
    })
</script>
<!--Details of Residence in Modal-->
<script>
  $("#modal-detailResidence").appendTo("body");
    $('#modal-detailResidence').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever')
      if(id){

        $.ajax({
          url: '{{ url('/residence/detail') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
          modal.find('.modal-body #id').text(data.id)
          modal.find('.modal-body #name_residence').text(data.name_residence)
            if(data.type_residence == 1) {
              modal.find('.modal-body #type_residence').text('- Apartamento')
            }else if (data.type_residence == 2) {
              modal.find('.modal-body #type_residence').text('- Thownhouse')
            }else{
              modal.find('.modal-body #type_residence').text('- Casa')
            }
            if(data.type_residence == '') {
              modal.find('.modal-body #type_residence').text('- No disponible.')
            }  
            if(data.type_center == null && data.type_corner == null && data.type_penhouse == null && data.type_structure == null ){
              modal.find('.modal-body #type_center').text('- No disponible')
            }else{
              if(data.type_center != null && data.aliquot_center != ''){
                modal.find('.modal-body #aliquot_center').text(data.aliquot_center, '%')
                modal.find('.modal-body #type_center').text('- Central')
              }else{
                modal.find('.modal-body #type_center').text('')
              }  
              if(data.type_corner != null && data.aliquot_corner != ''){
                modal.find('.modal-body #type_corner').text('- Esquina')
                modal.find('.modal-body #aliquot_corner').text(data.aliquot_corner)
              }else{
                modal.find('.modal-body #type_corner').text('')
              }   
              if(data.type_penhouse != null && data.aliquot_penhouse != ''){
                modal.find('.modal-body #type_penhouse').text('- Pen House')
                modal.find('.modal-body #aliquot_penhouse').text(data.aliquot_penhouse)
              }else{
                modal.find('.modal-body #type_penhouse').text('')
              } 
              if(data.type_structure != '' && data.structure != ''  && data.aliquot_structure != ''){
                modal.find('.modal-body #structure').text(data.structure)
                modal.find('.modal-body #aliquot_structure').text(data.aliquot_structure)
              }else{
                modal.find('.modal-body #structure').text('')
              }  
            }
            if(data.type_rif != null && data.number_rif != null){
              modal.find('.modal-body #type_rif').text(data.type_rif)
              modal.find('.modal-body #number_rif').text(data.number_rif)
            }else{
              modal.find('.modal-body #type_rif').text(' No disponible')
            }
            if(data.email_residence != null){
              modal.find('.modal-body #email_residence').val(data.email_residence)
            }else{
              modal.find('.modal-body #email_residence').text('No disponible.')
            }
            if(data.email_residence != null){
              modal.find('.modal-body #email_residence').text(data.email_residence)
            }else{
              modal.find('.modal-body #email_residence').text(' No disponible')
            }
            if(data.addres != null){
              modal.find('.modal-body #addres').text(data.addres)
            }else{
              modal.find('.modal-body #addres').text(' No disponible')
            }
        }).fail(function() {
          console.log("error");
        });
        $('#closeDetail').click(function(){
            location.reload()
        });
        $(document).keyup(function(e) {
          if (e.key === "Escape") {
            location.reload() 
          }
        });
      }
    })
</script>
<!--Delete Residence-->
<script>
  function deletedResidence (id){

  const swalWithBootstrapButtons = Swal.mixin({
    buttonsStyling: true
  })

  swalWithBootstrapButtons.fire({
    title: '¿Estas Seguro?',
    text: "¡Deseas eliminar esta residencia!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: '{{ url('/residence/deleted') }}',
        type: 'PUT',
        data: {
        _token: '{{ csrf_token() }}',
        id: id
      }
        }).done(function(id) {
        Swal.fire({
          icon: 'success',
          title: "¡Residencia eliminada exitosamente!",
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
        text: 'La residencia no fue eliminada.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      })
    }
  })
}
</script>

@endsection



