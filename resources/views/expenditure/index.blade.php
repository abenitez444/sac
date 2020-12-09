
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta de Gástos Mensuales')
@section('card-button')

@endsection

@section('content')
<form id="htmlExpenditure" name="htmlExpenditure" method="POST">
<div class="row justify-content-center form-group ">
	<div class="col-sm-6 col-md-6 col-lg-7">
	 <label for="name_residence_id" class="dark-grey-text font-weight-bold">Residencia</label>
	  <div class="inputWithIcon">
	    <select id="name_residence_id" name="name_residence_id" type="text" class=" custom-select @error('name_residence_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('name_residence_id') }}">
	      <option value="0" disabled selected>Seleccione</option>
	       @foreach($residence as $res)
	        <option value="{{$res->id}}">{{$res->name_residence}}</option>
	       @endforeach
	    </select>
	    <i class="fas fa-building fa-lg font-weight-bold" title="Seleccione el nombre de residencia del copropetario."></i>
	  </div>
	</div>
</div>
<div class="row">
	<div class="col-md-10 offset-lg-12">
 	  <div id="resultResidence" name="resuFormatos"></div>
	</div>
</div>
<hr>
</form>
@include('expenditure.edit')
@include('expenditure.detail')
@endsection

@section('js')

<script src="{{ asset('js/Spanish.json') }}"></script>
<script src="{{ asset('js/selectSearch.js') }}"></script>
<script src="{{ asset('js/simple-mask-money.js') }}"></script>
<script>
	
	$("#name_residence_id").change(function(event) {
		var data = $( "#htmlExpenditure" ).serialize();
	    $.ajax({
	    	type: 'POST',
	    	url: 'searchResidence',
	    	data: data,
	    	success: function(data){

	    	  	$('#resultResidence').html(data);
	    	  	$('#tableExpenditure').dataTable( {
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
    //Edit expenditure in modal 
    $("#modal-updateExpenditure").appendTo("body");
      $('#modal-updateExpenditure').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever')  
      var x;
 
      if(id){

        $.ajax({
          url: '{{ url('/editExpenditure') }}/'+id,
          type: 'GET',
           dataType: 'json',
        }).done(function(data) {
            modal.find('.modal-title').html('').append('<span class="font-weight-bold"><i class="fa fa-edit text-white fa-lg mt-1" title="Editar Gásto Mensual."></i> Editar Gásto Mensual - ' + data.name_residence.name_residence+'</span>')
            modal.find('#id_request').val(data.id)
            modal.find('.modal-body #residence_coowner').val(data.residence_coowner)
            modal.find('.modal-body #year').val(data.year)
            modal.find('.modal-body #month').val(data.month)
            modal.find('.modal-body #id').html('');
            modal.find('.modal-body #description_monthly').html('');
            modal.find('.modal-body #type_money').html('');
            modal.find('.modal-body #amount_monthly').html('');

            
          for(i=0; i < data.expenditures.length; i++) {
     
         
            modal.find('.modal-body #id').append('<input type="hidden" name="id[]" id="id[]" value="'+data.expenditures[i].id+'" placeholder="ID" class="form-control name_list mt-2" />')

            modal.find('.modal-body #description_monthly').append('<input type="text" name="description_monthly[]" id="description_monthly[]" value="'+data.expenditures[i].description_monthly+'" placeholder="Descripción del gásto" class="form-control name_list mt-2" />')
            
                if (data.expenditures[i].type_money == 1) {
                modal.find('.modal-body #type_money').append(" <select class='form-control browser-default custom-select fondo-gris element-focus mt-2' name='type_money[]' id='type_money[]'><option value='1'> Bolívares</option><option value='2'> Dolares</option><option value='3'> Euros</option></select>");
                }
                if (data.expenditures[i].type_money == 2) {
                modal.find('.modal-body #type_money').append(" <select class='form-control browser-default custom-select fondo-gris element-focus mt-2' name='type_money[]' id='type_money[]'><option value='2'> Dolares</option></option><option value='3'> Euros</option></option><option value='1'> Bolívares</option></select>");
                }
                if (data.expenditures[i].type_money == 3) {
                modal.find('.modal-body #type_money').append(" <select class='form-control browser-default custom-select fondo-gris element-focus mt-2' name='type_money[]' id='type_money[]'><option value='3'> Euros</option>><option value='1'> Bolívares</option><option value='2'> Dolares</option></select>");
                }


                modal.find('.modal-body #amount_monthly').append('<input type="text" name="monthly_amount[]" id="monthly_amount'+i+'" inputmode="numeric" value="'+data.expenditures[i].amount_monthly+'" placeholder="Descripción del gásto" class="form-control name_list mt-2" />')

                // configuration
                const config = {
                  allowNegative: false,
                  negativeSignAfter: false,
                  prefix: '',
                  suffix: '',
                  fixed: true,
                  fractionDigits: 2,
                  decimalSeparator: ',',
                  thousandsSeparator: '.',
                  cursor: 'move'
                };

                const inout = SimpleMaskMoney.setMask('#monthly_amount'+i+'', config);
         
          }

          //Edit Expenditure and save form
          $('#send-updateExpenditure').click(function(e){
            var data = $("#updateExpenditure").serialize();
            $.ajax({
              url: '{{ route('mon-expenditure.update') }}',
              type: 'POST',
              dataType: 'json',
              data: data,
              //Success
            }).done(function() {
              $('#modal-updateExpenditure').modal('hide')
              Swal.fire({
                icon: 'success',
                title: "¡Solicitud de Gásto Mensual se guardó exitosamente!",
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
                title: "No se realizo el registro del Gásto Mensual!",
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
<script>
 $("#detailExpenses").appendTo("body");
  $('#detailExpenses').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever') 
      
      var suma = 0;
      var suma_parse = 0;
      var total = 0;
      var total_general = 0;
      var aliq_center = 0;
      var aliq_corner = 0;
      var aliq_penhouse = 0;
      var x;

      if(id){

        $.ajax({
          url: '{{ url('/detailExpenses') }}/'+id,
          type: 'GET',
          dataType: 'json',
        })
        .done(function(data) {
      
          modal.find('.modal-title').html('').append('<span class="font-weight-bold text-white"><i class="far fa-list-alt text-white fa-lg  mt-1"></i> Detalle Mensual -' +' '+ data.name_residence.name_residence+'</span>')
          modal.find('.modal-body #id').text(data.id)
          modal.find('.modal-body #residence_coowner').text(data.name_residence.name_residence)
          modal.find('.modal-body #year').text(data.year)
          modal.find('.modal-body #month').text(data.type_month.month)
          modal.find('.modal-body #description_monthly').html('');
          modal.find('.modal-body #type_money').html('');
          modal.find('.modal-body #amount_monthly').html('');

         
          for(i=0; i < data.expenditures.length; i++) {
            
            x = parseFloat(data.expenditures[i].amount_monthly); 
            x = x.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2})
            suma += parseFloat(data.expenditures[i].amount_monthly);
            suma_parse += parseFloat(data.expenditures[i].amount_monthly);
            
            aliq_corner = data.name_residence.aliquot_corner*total_general;
            aliq_penhouse = data.name_residence.aliquot_penhouse*total_general;
            aliq_structure = data.name_residence.aliquot_structure*total_general;
          
            modal.find('.modal-body #expenditure_id').html('<span id="expenditure_id[]">'+data.expenditures[i].id+'</span>')
          
            modal.find('.modal-body #description_monthly').append('<br><span  name="expenditure_id[]" id="expenditure_id[]">'+data.expenditures[i].description_monthly+'</span><br>')

                if (data.expenditures[i].type_money == 1) {
                modal.find('.modal-body #type_money').append(' <br><span  name="type_money[]" id="type_money[]">Bolívares</span><br>');
                }
                

                if (data.expenditures[i].type_money == 2) {
                modal.find('.modal-body #type_money').append('<br><span  name="type_money[]" id="type_money[]">Dolares</span><br>');
                }

                if (data.expenditures[i].type_money == 3) {
                modal.find('.modal-body #type_money').append('<br><span  name="type_money[]" id="type_money[]">Euros</span><br>');
                }

                modal.find('.modal-body #amount_monthly').append('<br><span id="expenditure_id[]">'+x+'</span><br>')
        
          }

            total =  parseFloat(suma)*10/100;
            total_general =  suma+total;
            total_general =  total_general.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            total = total.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            suma = suma.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2})

            totali =  parseFloat(suma_parse)*10/100;
            total_aliquot =  suma_parse+totali;
            //Amount aliquot_center * total_aliquot
            aliq_center_parse = data.name_residence.aliquot_center; 
            aliq_center = aliq_center_parse*total_aliquot/100;
            aliq_center = aliq_center.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            //Amount aliquot_corner * total_aliquot
            aliq_corner_parse = data.name_residence.aliquot_corner;
            aliq_corner = aliq_corner_parse*total_aliquot/100;
            aliq_corner = aliq_corner.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            //Amount aliquot_penhouse * total_aliquot
            aliq_penhouse_parse = data.name_residence.aliquot_penhouse;
            aliq_penhouse = aliq_penhouse_parse*total_aliquot/100;
            aliq_penhouse = aliq_penhouse.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            //Amount aliquot_structure * total_aliquot
            aliq_structure_parse = data.name_residence.aliquot_structure;
            aliq_structure = aliq_structure_parse*total_aliquot/100;
            aliq_structure = aliq_structure.toLocaleString('in-EN', {minimumFractionDigits: 2, maximumFractionDigits: 2});
            // console.log(total_general);
            /*=========*/
            modal.find('.modal-body #suma_amount').html(' <br><span id="suma_amount">'+suma+'</span><br>');
            modal.find('.modal-body #total_amount').html(' <br><span id="total_amount">'+total+'</span><br>');
            modal.find('.modal-body #total_general').html(' <br><span id="total_general">'+total_general+'</span><br>');

            if (data.name_residence.type_center == 'on') {
                modal.find('.modal-body #aliquot_center').html(' <br><span id="aliquot_center">'+data.name_residence.aliquot_center+' %</span><br>');
                 modal.find('.modal-body #aliq_center').html(' <br><span id="aliq_center">'+aliq_center+' %</span><br>');
            }

            if (data.name_residence.type_corner == 'on') {
                modal.find('.modal-body #aliquot_corner').html(' <br><span id="type_corner">'+data.name_residence.aliquot_corner+' %</span><br>');
                modal.find('.modal-body #aliq_corner').html(' <br><span id="aliq_corner">'+aliq_corner.toLocaleString('es-CO')+' %</span><br>');
            }

            if (data.name_residence.type_penhouse == 'on') {
                modal.find('.modal-body #aliquot_penhouse').html(' <br><span id="type_corner">'+data.name_residence.aliquot_penhouse+' %</span><br>');
                modal.find('.modal-body #aliq_penhouse').html(' <br><span id="aliq_penhouse">'+aliq_penhouse.toLocaleString('en-IN')+' %</span><br>');
            }

             if (data.name_residence.type_structure == 'on') {
                modal.find('.modal-body #structure').html(' <br><span id="structure">'+data.name_residence.structure+' </span><br>');
                modal.find('.modal-body #aliquot_structure').html(' <br><span id="aliquot_structure">'+data.name_residence.aliquot_structure+' %</span><br>');
                modal.find('.modal-body #aliq_structure').html(' <br><span id="aliq_structure">'+aliq_structure.toLocaleString('en-IN')+' %</span><br>');
            }

        })
        .fail(function() {
          console.log("error");
        });
        $('#closeDetail').click(function(){
            //location.reload('index')
        });
        $(document).keyup(function(e) {
          if (e.key === "Escape") {
            //location.reload() 
          }
        });
      }
    })
</script>

@endsection