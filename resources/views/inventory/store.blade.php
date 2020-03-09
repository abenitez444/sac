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
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h5 class="font-weight-bold text-center"><i class="far fa-list-alt"></i> Bien Nacional</h5>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="form-group col-md-8">
            <div class="inputWithIcon">
              <select class="form-control custom-select" name="entity_id"  required>
              @empty($inventory->entity_id)
                <option disabled selected>Seleccione..</option>
              @endempty
              @foreach($entities as $entity)
                <option value="{{$entity->id}}" @isset($inventory->entity_id) {{ $inventory->entity_id == $entity->id? 'selected': ''}} @endisset>{{$entity->name}}</option>
              @endforeach
            </select>
              <i class="fas fa-building " title="Seleccione el ente."></i>
            </div>
          </div>
          <div class="form-group col-md-4">
            <div class="inputWithIcon">
              <input id="dependencia" type="text" class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" value="{{ $inventory->dependencia ?? '' }}" placeholder="Dependencia administrativa">
              <i class="fas fa-door-open  aria-hidden="true" title="Indique la dependencia administrativa."></i>
              @if ($errors->has('dependencia'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('dependencia') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group col-md-4">
            <div class="inputWithIcon">
              <input id="ubicacion" type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" value="{{ $inventory->ubicacion ?? '' }}" placeholder=" Ubicación física del bien" >
              <i class="fas fa-directions " title="Indique la ubicación del bien nacional."></i>
              @if ($errors->has('ubicacion'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('ubicacion') }}</strong>
              </span>
            @endif
            </div>
          </div>
          <div class="form-group col-md-4">
            <div class="inputWithIcon">
              <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{ $inventory->responsable ?? '' }}" placeholder=" Responsable del uso directo" >
              <i class="fas fa-user-tag " title="Indique el responsable del bien nacional."></i>
              @if ($errors->has('responsable'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('responsable') }}</strong>
              </span>
            @endif
            </div>
          </div>
          <div class="form-group col-md-4">
            <div class="inputWithIcon">
              <input id="codigo_interno" type="text" class="form-control{{ $errors->has('codigo_interno') ? ' is-invalid' : '' }}" name="codigo_interno" value="{{ $inventory->codigo_interno ?? '' }}" placeholder=" Código interno">
              <i class="fas fa-file-code " title="Indique el código interno del bien nacional."></i>
            </div>
          </div>
          <div class="form-group col-md-8 justify-content-center">
            <div class="inputWithIcon">
              <textarea id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $inventory->descripcion ?? '' }}" placeholder="Ingrese descripción. . ."></textarea>
              <i class="fas fa-list-alt " title="Indique la descripción del bien nacional."></i>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{ $inventory->serial ?? '' }}" placeholder="Serial del bien" >
              <i class="fas fa-file-code " title="Indique el serial del bien nacional."></i>
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ $inventory->modelo ?? '' }}" placeholder="Modelo del bien" >
              <i class="fas fa-money-check " title="Indique el modelo del bien nacional."></i>
              @if ($errors->has('modelo'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('modelo') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ $inventory->text ?? '' }}" placeholder="Marca del bien">
              <i class="fas fa-money-check " title="Indique la marca del bien nacional."></i>
              @if ($errors->has('marca'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('marca') }}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ $inventory->cantidad ?? '' }}" placeholder="Cantidad" >
              <i class="fas fa-copyright " title="Indique la cantidad."></i>
              @if ($errors->has('cantidad'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('cantidad') }}</strong>
                </span>
              @endif
            </div>  
          </div>
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="especificacion" type="text" class="form-control{{ $errors->has('especificacion') ? ' is-invalid' : '' }}" name="especificacion" value="{{ $inventory->especificacion ?? '' }}" placeholder="Especificación">
              <i class="fas fa-file-alt " title="Especifique el bien nacional."></i>
              @if ($errors->has('especificacion'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('especificacion') }}</strong>
                </span>
              @endif
            </div>
          </div>  
          <div class="form-group col-md-6">
            <div class="inputWithIcon">
              <input id="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" value="{{ $inventory->detalle ?? '' }}" placeholder="Detalles">
              <i class="fas fa-list-alt " title="Indique detalles del bien nacional."></i>
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
    <div class="card-footer">
      <div class="form-group text-center">
        <button type="button" id="send-inventory" class="btn btn-primary" >Guardar</button>
        <a href="{{route('index')}}" class="btn btn-danger">Cancelar</a>
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
      }).done(function() {
        Swal.fire({
          type: 'success',
          title: "Inventario registrado exitosamente!",
          showConfirmButton: false,
          timer: 2000
        }) 
        $("#inventory-form")[0].reset();
      }).fail(function() {
        Swal.fire({
          type: 'error',
          title: "No se realizo el registro!",
          showConfirmButton: false,
          timer: 2000
        })
      });
    })
</script>
@endsection