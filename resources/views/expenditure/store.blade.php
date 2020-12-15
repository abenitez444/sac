@extends('layouts.app')
@section('card-subtitle', '')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
<form id="addExpenditure" name="addExpenditure" method="POST">
  @csrf
<input type="hidden" name="id" >
<div class="row  justify-content-center">
  <div class="col-sm-8 col-md-11 col-lg-11">
    <div class="card">
      <div class="card-header info-color-dark text-white">
        <h5 class="font-weight-bold text-center"><i class="far fa-list-alt fa-lg"></i> Registro de Gástos Mensuales</h5>
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
              <label class="dark-grey-text font-weight-bold">Residencia</label>
              <div class="inputWithIcon">
                  <select class="form-control{{ $errors->has('residence_coowner') ? ' is-invalid' : '' }} browser-default buscador custom-select fondo-gris element-focus" name="residence_coowner" id="residence_coowner" >
                    <option disabled selected>Buscar. . .</option>
                    @foreach($residence as $res)
                    <option value="{{ $res->id }}">{{ $res->name_residence }}</option>
                    @endforeach
                  </select>
               <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5 text-left">
                <!-- Default input -->
              <label class="dark-grey-text font-weight-bold">Año</label>
                <select class="browser-default custom-select" id="year" name="year" required disabled>
                <option  value="" disabled selected>Seleccione...</option>
              @for($anio=(date("Y")+5); 1980<=$anio; $anio--)
                <option value="{{ $anio }}">{{ $anio }}</option>
              @endfor
              </select>
               <p class="campo-obligatorio">* Campo obligatorio</p>
              <div id="errorcontainer-ano" class='errorDiv'></div>
              </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <label class="dark-grey-text font-weight-bold">Mes</label>
                <div class="inputWithIcon">
                    <select class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }} browser-default custom-select fondo-gris element-focus" name="month" id="month" disabled>
                      <option value="" disabled selected>Buscar. . .</option>
                      @foreach($month as $m)
                      <option value="{{ $m->id }}">{{ $m->month }}</option>
                      @endforeach
                    </select>
                 <p class="campo-obligatorio">* Campo obligatorio</p>
                </div>
            </div>
          </div>
        </div>
       </div>
      <div class="row">
        <div class="col-md-10 offset-lg-1">
          <div id="resultClient" name="resuFormatos"> </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-8 col-md-10 col-lg-10"> 
        <div class="container">
        <br />
       
       
        <div class="table-responsive">
        <table class="table table-bordered" id="dynamic_field">
        <tr>
        <td><label class="dark-grey-text font-weight-bold"><b>Descripción</b></label><input type="text" name="description_monthly[]" id="description_monthly[]" placeholder="Ingrese. . ." class="form-control name_list mt-2" /></td>
        <td><label class="dark-grey-text font-weight-bold"><b>Moneda</b></label><select class="form-control mt-2 custom-select fondo-gris element-focus" name="type_money[]" id="type_money[]"><option disabled selected>Tipo</option>@foreach($typeMoney as $money)<option value="{{$money->id}}">{{$money->option}}</option>@endforeach</select></td>
        <td><label class="dark-grey-text font-weight-bold">Monto</label><input type="text" name="amount_monthly[]" inputmode="numeric" id="amount_monthly" placeholder="Ingrese cantidad. . ." class="form-control moneyType name_list mt-2" value="0,00" /></td>
        <td><button type="button" name="add" id="add" class="btn peach-gradient btn-rounded mt-3 ml-2"><i class="fas fa-plus fa-lg text-white font-weight-bold"></i></button></td>
        </tr>
        </table>
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
<script src="{{ asset('js/simple-mask-money.js') }}"></script>
<script>
 
  $(document).ready(function(){
  // configuration
      const args = {
        //afterFormat(e) { console.log('afterFormat', e); },
        allowNegative: false,
        //beforeFormat(e) { console.log('beforeFormat', e); },
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: ',',
        thousandsSeparator: '.',
        cursor: 'move'
      };

      // select the element
      const input = SimpleMaskMoney.setMask('#amount_monthly', args);

      // This method return value of your input in format number to save in your database
      //input.formatToNumber();
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

<script>
$(document).ready(function(){
    

  var i= 1;
  $('#add').click(function(){

  i++;
  //$('.amount').mask('099.090.990,99');
  $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="description_monthly[]" id="description_monthly[]" placeholder="Descripción del gásto" class="form-control name_list mt-2" /></td><td><select class="form-control mt-2 custom-select fondo-gris element-focus" name="type_money[]" id="type_money[]" ><option disabled selected>Tipo:</option>@foreach($typeMoney as $money)<option value="{{$money->id}}">{{$money->option}}</option>@endforeach</select></td><td><input type="text" name="amount_monthly[]" id="amount_monthly'+i+'" inputmode="numeric" value="0,00" placeholder="Monto" class="form-control name_list mt-2" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-rounded btn_remove ml-2"><b>X</b></button></td></tr>');

      // configuration
      const config = {
        //afterFormat(e) { console.log('afterFormat', e); },
        allowNegative: false,
        //beforeFormat(e) { console.log('beforeFormat', e); },
        negativeSignAfter: false,
        prefix: '',
        suffix: '',
        fixed: true,
        fractionDigits: 2,
        decimalSeparator: ',',
        thousandsSeparator: '.',
        cursor: 'move'
      };

      // select the element
      const nueov = SimpleMaskMoney.setMask('#amount_monthly'+i+'', config);

  });


    /*SimpleMaskMoney.args = {
            afterFormat(e) { console.log('afterFormat', e); },
            allowNegative: false,
            beforeFormat(e) { console.log('beforeFormat', e); },
            negativeSignAfter: false,
            prefix: '',
            suffix: '',
            fixed: true,
            fractionDigits: 2,
            decimalSeparator: ',',
            thousandsSeparator: '.',
            cursor: 'move'
          };

          input.oninput = () => {
            input.value = SimpleMaskMoney.format(input.value);
          }

          // Your send method
          input.onkeyup = (e) => {
            if (e.key !== "Enter") return;
            // This method return value of your input in format number to save in your database
            SimpleMaskMoney.formatToNumber(input.value);
          }*/

  $(document).on('click', '.btn_remove', function(){
  var button_id = $(this).attr("id"); 
  $('#row'+button_id+'').remove();
  });



});
</script>

@endsection