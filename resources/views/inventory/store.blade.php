@extends('layouts.app')
@section('card-title', 'Inventario')
@section('card-subtitle', '')
@section('content')

@section('css')
<link rel="stylesheet" href="{{ asset('css/form-styles.css') }}">
@endsection
<form id="inventory-form" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{ $inventory->id ?? '' }}">
<div class="row  justify-content-center">
  	<div class="col-sm-8 col-md-11 col-lg-11">
	  	<div class="card">
		    <div class="card-header bg-primary text-white">
		      <h5 class="font-weight-bold text-center"><i class="far fa-list-alt"></i> Bien Nacional</h5>
		    </div>
		    <div class="row">
		      <div class="sidebar-brand-text mx-3 mt-2 ml-4"><i class="fas fa-atlas text-primary sidebar-brand-icon rotate-n-15"></i> <b class="text-primary"> SIGESPRO</b></div>
		    </div>
		    <div class="card-body">
		      <div class="container" >
		        <div class="row">
		          <div class="col-sm-12 col-md-8 col-lg-8">
		          	<label><b>Ente:</b></label>
		            <div class="inputWithIcon">
		                <select class="form-control{{ $errors->has('entity_id') ? ' is-invalid' : '' }} custom-select fondo-gris element-focus" name="entity_id"  required>
			              @empty($inventory->entity_id)
			                <option disabled selected>Ente</option>
			              @endempty
			              @foreach($entities as $entity)
			                <option value="{{$entity->id}}" @isset($inventory->entity_id) {{ $inventory->entity_id == $entity->id? 'selected': ''}} @endisset>{{$entity->name}}</option>
			              @endforeach
		                </select>
		              <i class="fas fa-building fa-lg" title="Seleccione el ente."></i>
		             <p class="campo-obligatorio">* Campo obligatorio</p>
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Dependencia:</b></label>
		            <div class="inputWithIcon">
		              <input id="dependencia" type="text" class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" value="{{ $inventory->dependencia ?? '' }}" placeholder="Dependencia administrativa"  onkeypress="return letters(event)">
		              <i class="fas fa-door-closed fa-lg" title="Indique la dependencia administrativa."></i>
		              @if ($errors->has('dependencia'))
		                <span class="invalid-feedback">
		                  <strong>{{ $errors->first('dependencia') }}</strong>
		                </span>
		              @endif
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Ubicación:</b></label>
		            <div class="inputWithIcon">
		              <input id="ubicacion" type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" value="{{ $inventory->ubicacion ?? '' }}" placeholder=" Ubicación física del bien" >
		              <i class="fas fa-directions fa-lg" title="Indique la ubicación del bien nacional."></i>
		              @if ($errors->has('ubicacion'))
		              <span class="invalid-feedback">
		                <strong>{{ $errors->first('ubicacion') }}</strong>
		              </span>
		            @endif
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		            <label><b>Responsable:</b></label>
		            <div class="inputWithIcon">
		              <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{ $inventory->responsable ?? '' }}" placeholder=" Responsable del uso directo" onkeypress="return letters(event)">
		              <i class="fas fa-user-tag fa-lg" title="Indique el responsable del bien nacional."></i>
		              @if ($errors->has('responsable'))
		              <span class="invalid-feedback">
		                <strong>{{ $errors->first('responsable') }}</strong>
		              </span>
		            @endif
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<div class="form-group">
			            <label><b>Código:</b></label>
			            <div class="inputWithIcon">
			              <input id="codigo_interno" type="text" class="form-control{{ $errors->has('codigo_interno') ? ' is-invalid' : '' }}" name="codigo_interno" value="{{ $inventory->codigo_interno ?? '' }}" placeholder=" Código interno">
			              <i class="fas fa-file-code fa-lg" title="Indique el código interno del bien nacional."></i>
			            </div>
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-10 col-lg-10 offset-1">
		            <div class="form-group">
			            <label><b>Descripción:</b></label>
			            <div class="inputWithIcon">
			              <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} textarea-gris element-focus" name="descripcion" value="{{ $inventory->descripcion ?? '' }}" placeholder="Ingrese descripción. . .">{{ $inventory->descripcion ?? '' }}</textarea>
			              <i class="fas fa-list-alt fa-lg" title="Indique la descripción del bien nacional."></i>
			            </div>
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Serial:</b></label>
		            <div class="inputWithIcon">
		              <input id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{ $inventory->serial ?? '' }}" placeholder="Serial del bien">
		              <i class="fas fa-file-code fa-lg" title="Indique el serial del bien nacional."></i>
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Marca:</b></label>
		            <div class="inputWithIcon">
		              <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ $inventory->marca ?? '' }}" placeholder="Marca del bien">
		              <i class="fas fa-money-check fa-md" title="Indique la marca del bien nacional."></i>
		              @if ($errors->has('marca'))
		                <span class="invalid-feedback">
		                  <strong>{{ $errors->first('marca') }}</strong>
		                </span>
		              @endif
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<div class="form-group">
			          	<label><b>Modelo:</b></label>
			            <div class="inputWithIcon">
			              <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ $inventory->modelo ?? '' }}" placeholder="Modelo del bien" >
			              <i class="fas fa-money-check fa-md" title="Indique el modelo del bien nacional."></i>
			              @if ($errors->has('modelo'))
			                <span class="invalid-feedback">
			                  <strong>{{ $errors->first('modelo') }}</strong>
			                </span>
			              @endif
			            </div>
		            </div>
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Cantidad:</b></label>
		            <div class="inputWithIcon">
		              <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ $inventory->cantidad ?? '' }}" placeholder="Cantidad" onkeypress="return numbers(event)">
		              <i class="fas fa-copyright fa-lg" title="Indique la cantidad."></i>
		              @if ($errors->has('cantidad'))
		                <span class="invalid-feedback">
		                  <strong>{{ $errors->first('cantidad') }}</strong>
		                </span>
		              @endif
		            </div>  
		          </div>
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<label><b>Especifique:</b></label>
		            <div class="inputWithIcon">
		              <input id="especificacion" type="text" class="form-control{{ $errors->has('especificacion') ? ' is-invalid' : '' }}" name="especificacion" value="{{ $inventory->especificacion ?? '' }}" placeholder="Especificación">
		              <i class="fas fa-file-alt fa-lg" title="Especifique el bien nacional."></i>
		              @if ($errors->has('especificacion'))
		                <span class="invalid-feedback">
		                  <strong>{{ $errors->first('especificacion') }}</strong>
		                </span>
		              @endif
		            </div>
		          </div>  
		          <div class="col-sm-12 col-md-4 col-lg-4">
		          	<div class="form-group">
			          <label><b>Detalle:</b></label>
			          <div class="inputWithIcon">
			              <input id="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" value="{{ $inventory->detalle ?? '' }}" placeholder="Detalles">
			              <i class="fas fa-list-alt fa-lg" title="Indique detalles del bien nacional."></i>
			              @if ($errors->has('detalle'))
			              <span class="invalid-feedback">
			                <strong>{{ $errors->first('detalle') }}</strong>
			              </span>
			            @endif
			          </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="card-footer justify-content-center">
			    <div class="text-center mt-1">
			        <button type="button" id="send-inventory" class="btn btn-primary" ><i class="fas fa-share-square fa-md"></i> <b>Guardar</b></button>
			        <a href="{{route('index')}}" class="btn btn-info"><i class="fas fa-search font-weight-bold fa-md" title="Consultar inventarios"></i><b> Buscar</b></a>
			    </div>
		    </div>
		</div>
	</div>
</div>

</form>  
@endsection

@section('js')
<script>
 $('#send-inventory').click(function(e){
    var data = $("#inventory-form").serialize();
      $.ajax({
        url: '{{ route('save') }}',
        type: 'POST',
        dataType: 'json',
        data: data,
      //success
    }).done(function() {
        Swal.fire({
          icon: 'success',
          title: "El inventario se guardó exitosamente!",
          showConfirmButton: true,
          timer: 2000
        }).then((result) => {
          if (result.value){
            location.reload()
          }
        })
      //Errors
        $("#inventory-form")[0].reset();
    }).fail(function(msj) {
        Swal.fire({
          icon: 'error',
          title: "No se realizo el registro de inventario!",
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
</script>

@endsection