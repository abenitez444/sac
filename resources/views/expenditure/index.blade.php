
@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
@section('card-title', 'Consulta de Gástos Mensuales')
@section('card-button')

@endsection

@section('content')
<form id="htmlExpenditure" name="htmlExpenditure" method="POST">
<div class="row justify-content-center">
	<div class="col-sm-6 col-md-6 col-lg-7">
	 <label for="name_residence_id"><b>Residencia:</b></label>
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
	<div class="col-md-10 offset-lg-1">
 	  <div id="resultResidence" name="resuFormatos"></div>
	</div>
</div>
<hr>
</form>
@include('expenditure.edit')
@endsection

@section('js')

<script src="{{ asset('js/Spanish.json') }}"></script>
<script src="{{ asset('js/selectSearch.js') }}"></script>
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
	//var table = $('#tableExpenditure').DataTable();

	        }                           
        })
	});
</script>
<script>
    //Edit employee in modal 
    $("#modal-updateExpenditure").appendTo("body");
      $('#modal-updateExpenditure').on('show.bs.modal', function (event) {
      var modal = $(this)
      var button = $(event.relatedTarget) 
      var id = button.data('whatever')  
      
      if(id){

        $.ajax({
          url: '{{ url('/editExpenditure') }}/'+id,
          type: 'GET',
           dataType: 'json',
        }).done(function(data) {
            modal.find('.modal-title')
            modal.find('.modal-body #id').val(data.id)
            modal.find('.modal-body #residence_coowner').val(data.residence_coowner)
            modal.find('.modal-body #year').val(data.year)
            modal.find('.modal-body #month').val(data.month)
            
       if(data.expenditures.length > 0){
          
          for(i=0; i < data.expenditures.length; i++) {
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

            modal.find('.modal-body #amount_monthly').append('<input type="text" name="amount_monthly[]" id="amount_monthly[]" value="'+data.expenditures[i].amount_monthly+'" placeholder="Descripción del gásto" class="form-control name_list mt-2" />')
 
            }
          }
          //Edit Co-owner and save form
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
      
        $('#close').click(function(){
        location.reload()
        });
      }
    })
</script>


@endsection