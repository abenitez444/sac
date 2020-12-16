@extends('layouts.app')
@section('card-subtitle', '')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
<form id="addPayment" name="addPayment" method="POST">
  @csrf
<input type="hidden" name="id" >
<div class="row  justify-content-center">
  <div class="col-sm-8 col-md-11 col-lg-11">
    <div class="card">
      <div class="card-header info-color-dark text-white">
        <h5 class="font-weight-bold text-center"><i class="far fa-list-alt fa-lg"></i> Registrar Pago del Copropietario</h5>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 ">   
          <div class="sidebar-brand-text mx-3 push ml-3 mt-1">
            <i class="fas fa-atlas dark-grey-text sidebar-brand-icon"> GC-GCA</i>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="container" >
          <div class="row justify-content-center form-group">
            <div class="col-sm-12 col-md-6 col-lg-6">
              
              <label class="dark-grey-text font-weight-bold">Copropietario</label>
              <div class="inputWithIcon">
                  <select class="form-control{{ $errors->has('name_coowner') ? ' is-invalid' : '' }} browser-default buscador custom-select fondo-gris element-focus" name="name_coowner" id="name_coowner" >
                    <option disabled selected>Buscar. . .</option>
                    @foreach($coowner as $res)
                    <option value="{{ $res->id }}">{{ $res->name }}</option>
                    @endforeach
                  </select>
               <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row form-group">
            <div class="col-md-10 offset-lg-1">
              <div id="resultCoowner" name="resuFormatos"></div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5 text-left">
                <!-- Default input -->
              <label class="dark-grey-text font-weight-bold">Año</label>
                <select class="browser-default custom-select" id="year" name="year" required disabled>
                <option  value="" disabled selected>Seleccione...</option>
     
                <option value="#"></option>
   
              </select>
               <p class="campo-obligatorio">* Campo obligatorio</p>
              <div id="errorcontainer-ano" class='errorDiv'></div>
              </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <label class="dark-grey-text font-weight-bold">Mes</label>
                <div class="inputWithIcon">
                    <select class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }} browser-default custom-select fondo-gris element-focus" name="month" id="month" disabled>
                      <option value="" disabled selected>Buscar. . .</option>
                   
                      <option value="#"></option>
              
                    </select>
                 <p class="campo-obligatorio">* Campo obligatorio</p>
                </div>
            </div>
          </div>
        </div>
       </div>
        <div class="card-footer justify-content-center">
          <div class="text-center mt-1">
              <button type="button" id="send-expenditure" class="btn btn-deep-orange" ><i class="fas fa-save font-weight-bold text-white fa-2x" title="Guardar Gásto Mensual."> </i></button>
              <a href="{{ route('mon-expenditure.index') }}" class="btn info-color-dark text-white"><i class="fas fa-search font-weight-bold fa-2x" title="Consultar Gástos Mensuales."></i></a>
          </div>
        </div>
    </div>
  </div>
</div>
</form>  
@endsection
@section('js')
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/selectSearch.js') }}"></script>
<script>
  
  $("#name_coowner").change(function(event) {
    var data = $( "#addPayment" ).serialize();
      $.ajax({
        type: 'POST',
        url: 'searchCoowner',
        data: data,
        success: function(data){

            $('#resultCoowner').html(data);
            $('#tablePayment').dataTable( {
                "drawCallback": function( settings ) {
                    var api = new $.fn.dataTable.Api( settings );
             
                    // Output the data for the visible rows to the browser's console
                    // You might do something more useful with it!
                    console.log( api.rows( {page:'current'} ).data() );
                }
            } );
          }                           
        })
  });
</script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  //Register employee in modal 
  $(document).ready(function(){
    $('#send-expenditure').click(function(e){
      var data = $("#addExpenditure").serialize();
      
      $.ajax({
        url: '{{ route('mon-expenditure.store') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
        //Success
      }).done(function() {
        Swal.fire({
          icon: 'success',
          title: "¡Registro Mensual de Gástos se guardó exitosamente!",
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
  })
</script>

@endsection