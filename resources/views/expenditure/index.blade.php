
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
	        }                           
        })
	});

</script>
<script>
$(document).ready(function(){
    var table = $('#expenditureTable').DataTable();
  })
</script>

@endsection