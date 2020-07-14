
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">

@endsection
@section('card-title', 'Consulta de Residencias')
@section('card-button')
<div class="d-none d-sm-inline-block">
  <a href="#" class="btn btn-success btn-icon-split btn-sm" id="btn-newResidence" data-toggle="modal" data-target="#modal-createResidence">
    <span class="icon text-white-50">
      <i class="fas fa-plus font-weight-bold mt-1"></i>
    </span>
    <span class="text font-weight-bold"> Registrar</span>
  </a>
</div>
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-header bg-gradient-dark">
    <h5 class="font-weight-bold text-white">Lista de residencias</h5>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table id="residenceTable" class="table table-bordered table-hover" data-order='[[ 0, "desc" ]]' data-page-length='10'>
        <thead>
          <tr class="text-center">
            <th><b>Conjunto residencial</b></th>
            <th><b>Tipo residencia</b></th>
            <th><b>Estructura</b></th>
            <th><b>RIF</b></th>
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
                @if($res->type_center == 'on') Central <br> @else <input type="hidden" style="display:none;"> @endif 
                @if($res->type_corner == 'on') Esquina <br>@else <input type="hidden" style="display:none;">  @endif
                @if($res->type_penhouse == 'on') Pen House <br>@else <input type="hidden" style="display:none;"> @endif
                @if($res->type_structure == 'on' && $res->structure != '') {{$res->structure}} <br> @else <input type="hidden" style="display:none;">@endif
              @endif
             </td>

             <td>
              @if($res->type_rif != '' && $res->number_rif != '')                                 {{$res->type_rif}}-{{$res->number_rif}}
              @else
              No disponible
              @endif
             </td>

              @isset($res->addres)
               <td>{{$res->addres}}</td>
              @else
               <td>No disponible</td>
              @endisset
             <td>
              <a href="detail/{{$res->id}}" class="icono" title="Visualizar" id="btn-detailResidence" data-toggle="modal" data-target="#modal-detailResidence" data-whatever="{{$res->id}}">
                <b class="radiusV fa fa-eye"></b>
              </a>
              <a href="edit/{{$res->id}}" class="icono" title="Editar" id="btn-editResidence" data-toggle="modal" data-target="#modal-editResidence" data-whatever="{{$res->id}}">
                <b class="radiusM fa fa-edit"></b>
              </a>
              <a href="#" class="icono" title="Eliminar" onclick="deletedResidence('{{$res->id}}')">
                <b class="radiusM fa fa-trash icon-danger"></b>
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

<script>
    $(document).ready(function(){
var maxField = 10; //Input fields increment limitation
var addButton = $('.add_button'); //Add button selector
var wrapper = $('.field_wrapper'); //Input field wrapper


var x = 1; //Initial field counter is 1
$(addButton).click(function(){ //Once add button is clicked
var contentCC = $('#contentCC').html();
if(x < maxField){ //Check maximum number of input fields
x++; //Increment field counter
$(wrapper).append('<div id=row'+x+'>'+contentCC+'<a href="javascript:removeROW('+x+');" title="Add field"><img class="img-delete2" src="../img/delete.png"/></a></div>'); // Add field html
}
});

/*    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
e.preventDefault();
$('#row').remove(); //Remove field html
x--; //Decrement field counter
});*/

var mr = 1;
var buttonMR = $('.button-mr');
var contentMR = $('.content-mr');

//Initial field counter is 1 Datos N°'+mr+'
$(buttonMR).click(function(){ //Once add button is clicked
//Check maximum number of input fields
var MRcontent = $('#contentMR').html(); 

$(contentMR).append('<div id="MRrow'+mr+'""><hr><h6>Datos N°:'+mr+'</h6>'+MRcontent+'<div class="col-md-1"><a href="javascript:RemoveRM('+mr+');" class="removeRM" data="'+mr+'" title="Add field"><img class="img-delete2" src="img/delete.png" style="margin-top: 20px !important;" /></a></div></div>'); // Add field html

mr++;

});

var cl = 1;
var buttonCL = $('.button-cl');
var contentCL = $('.content-cl'); 

//Initial field counter is 1 Datos N°'+hs+'
$(buttonCL).click(function(){ //Once add button is clicked
//Check maximum number of input fields
var CLcontent = $('#contentCL').html(); 

$(contentCL).append('<div id="CLrow'+cl+'""><hr><h6>Datos N°:'+cl+'</h6>'+CLcontent+'<div class="col-md-1"><a href="javascript:RemoveCL('+cl+');" class="removeRM" data="'+cl+'" title="Add field"><img class="img-delete2" src="img/delete.png" style="margin-top: 20px !important;" /></a></div></div>'); // Add field html

cl++;

});


});
</script>

<script type="text/javascript">
  //Register residence in modal 
  $(document).ready(function(){
    var modal = $(this)

    var table = $('#residenceTable').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      },
    });

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
          if(data.type_center === 'on'){
            modal.find('.modal-body #type_center').prop('checked', true);
          }else{
            modal.find('.modal-body #type_center').prop('checked', false);
          }
          if(data.type_corner === 'on'){
            modal.find('.modal-body #type_corner').prop('checked', true);
          }else{
            modal.find('.modal-body #type_corner').prop('checked', false);
          }
          if(data.type_penhouse === 'on'){
            modal.find('.modal-body #type_penhouse').prop('checked', true);
          }else{
            modal.find('.modal-body #type_penhouse').prop('checked', false);
          }
          if(data.type_structure === 'on'){
            modal.find('.modal-body #type_structure').prop('checked', true);
             
            if(data.structure != ''){
              modal.find('.modal-body #structure').removeClass('m-hidden');
              modal.find('.modal-body #structure').val(data.structure)
            }
          }else{
             modal.find('.modal-body #structure').addClass('m-hidden');
             modal.find('.modal-body #type_structure').prop('checked', false);
          }
          modal.find('.modal-body #type_rif').val(data.type_rif)
          modal.find('.modal-body #number_rif').val(data.number_rif)
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
      }
    })
</script>
<!--Details of residence in modal -->
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
              modal.find('.modal-body #type_residence').text('- Apartamento');
            }else if (data.type_residence == 2) {
              modal.find('.modal-body #type_residence').text('- Thownhouse');
            }else{
              modal.find('.modal-body #type_residence').text('- Casa');
            }
            if(data.type_residence == '') {
              modal.find('.modal-body #type_residence').text('- No disponible.');
            }  
            if(data.type_center == 'on'){
              modal.find('.modal-body #type_center').text('- Central');
            }else{
              modal.find('.modal-body #type_center').text('');
            }  
            if(data.type_corner == 'on'){
              modal.find('.modal-body #type_corner').text('- Esquina');
            }else{
              modal.find('.modal-body #type_corner').text('');
            }   
            if(data.type_penhouse == 'on'){
              modal.find('.modal-body #type_penhouse').text('- Pen House');
            }else{
              modal.find('.modal-body #type_penhouse').text('');
            } 
            if(data.type_structure == 'on' && data.structure != ''){
              modal.find('.modal-body #structure').text(data.structure);
            }else{
              modal.find('.modal-body #type_penhouse').text('');
            }  
        })
        .fail(function() {
          console.log("error");
        });
      }
    })
</script>
<!--Delete residence-->
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



