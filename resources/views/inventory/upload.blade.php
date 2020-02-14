@extends('layouts.app')
@section('card-title', 'Inventario')
@section('card-subtitle', 'Pagina de inicio')
@section('content')
	<form method="POST" id="file_form" action="/inventory/uploadFile"  enctype="multipart/form-data">
	  	@csrf
	  	<div class="row">
		  	<div class="col-12">
			    <div class="card ">
				 	<div class="card-header d-flex justify-content-center bg-primary">
		        		<h6> <b class="text-white"><i class="fas fa-file links fa-md text-center"></i> Adjuntar archivo</b></h6>
			        </div>

					<div class="col-md-4 form-group">
						<select name="entity" id="entity" class="form-control mt-2">
							<option value="0" disabled selected>Seleccione...</option>
							@foreach($entities as $entity)
								<option value="{{$entity->id}}">{{$entity->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="col-md-4 form-group">
						<label for="file"><i class="fas fa-cloud-upload-alt fa-2x text-dark"></i></label>
						<input  type="file" id="file" name="file" class="form-control"  title="Subir archivo">
					</div>
				</div>
			   	<div class="form-group row">
		            <div class="offset-sm-3 col-sm-9">
		                <button type="submit" class="btn btn-primary"><b><i class="fas fa-check-circle fa-lg"></i> Enviar</b></button>
		            </div>
		        </div>
			</div>	
		</div>
	</form>
@endsection