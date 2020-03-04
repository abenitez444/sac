@extends('layouts.app')
@section('card-title', 'Inventario')
@section('card-subtitle', '')
@section('content')

<form action="{{route('save')}}" method="POST">
  @csrf
  <input type="hidden" name="id" value="{{ $inventory->id ?? '' }}">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <h4 class="font-weight-bold">Datos del Bien</h4>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="entity_id" class="">Ente</label>
            <select class="form-control custom-select" name="entity_id"  required>
              @empty($inventory->entity_id)
                <option disabled selected>Seleccione..</option>
              @endempty
              @foreach($entities as $entity)
                <option value="{{$entity->id}}" @isset($inventory->entity_id) {{ $inventory->entity_id == $entity->id? 'selected': ''}} @endisset>{{$entity->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="dependencia" class="">Dependecia administrativa</label>
            <input id="dependencia" type="text" class="form-control{{ $errors->has('dependencia') ? ' is-invalid' : '' }}" name="dependencia" value="{{ $inventory->dependencia ?? '' }}" placeholder="" >
            @if ($errors->has('dependencia'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('dependencia') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="ubicacion" class="">Ubicación física del bien</label>
            <input id="ubicacion" type="text" class="form-control{{ $errors->has('ubicacion') ? ' is-invalid' : '' }}" name="ubicacion" value="{{ $inventory->ubicacion ?? '' }}" placeholder="" >
            @if ($errors->has('ubicacion'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('ubicacion') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="responsable" class="">Responsable del uso directo del bien</label>
            <input id="responsable" type="text" class="form-control{{ $errors->has('responsable') ? ' is-invalid' : '' }}" name="responsable" value="{{ $inventory->responsable ?? '' }}" placeholder="" >
            @if ($errors->has('responsable'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('responsable') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="codigo_interno" class="">Codigo interno del bien</label>
            <input id="codigo_interno" type="text" class="form-control{{ $errors->has('codigo_interno') ? ' is-invalid' : '' }}" name="codigo_interno" value="{{ $inventory->codigo_interno ?? '' }}" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="descripcion" class="">Descripción</label>
            <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ $inventory->descripcion ?? '' }}" placeholder="">
          </div>
          <div class="form-group col-md-6">
            <label for="serial" class=""> Código del serial del bien</label>
            <input id="serial" type="text" class="form-control{{ $errors->has('serial') ? ' is-invalid' : '' }}" name="serial" value="{{ $inventory->serial ?? '' }}" placeholder="" >
          </div>
          <div class="form-group col-md-6">
            <label for="modelo" class="">Modelo del bien</label>
            <input id="modelo" type="text" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" name="modelo" value="{{ $inventory->modelo ?? '' }}" placeholder="" >
            @if ($errors->has('modelo'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('modelo') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="marca" class="">Marca del bien</label>
            <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ $inventory->text ?? '' }}" placeholder="">
            @if ($errors->has('marca'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('marca') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="cantidad" class="">Cantidad</label>
            <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{ $inventory->cantidad ?? '' }}" placeholder="" >
            @if ($errors->has('cantidad'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('cantidad') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="especificacion" class="">Especificaión</label>
            <input id="especificacion" type="text" class="form-control{{ $errors->has('especificacion') ? ' is-invalid' : '' }}" name="especificacion" value="{{ $inventory->especificacion ?? '' }}" placeholder="">
            @if ($errors->has('especificacion'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('especificacion') }}</strong>
              </span>
            @endif
          </div>
          <div class="form-group col-md-6">
            <label for="detalle" class="">Datelles</label>
            <input id="detalle" type="text" class="form-control{{ $errors->has('detalle') ? ' is-invalid' : '' }}" name="detalle" value="{{ $inventory->detalle ?? '' }}" placeholder="">
            @if ($errors->has('detalle'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('detalle') }}</strong>
              </span>
            @endif
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <div class="form-group text-center">
        <button type="sumbit" class="btn btn-success">Guardar</button>
        <a href="{{route('index')}}" class="btn btn-danger">Cancelar</a>
      </div>
    </div>
  </div>
</form>  


@endsection