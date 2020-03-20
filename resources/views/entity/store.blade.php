<div class="modal fade" id="modal-createEntity" tabindex="-1" role="dialog" aria-labelledby="modal-createEntity"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="entity">
    <div class="modal-content">
      <div class="modal-header bg-primary"><i class="fas fa-building fa-lg mr-2 mt-1 text-white" title="Seleccione el ente."></i> <h5 class="text-white font-weight-bold">Ente</h5>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="entity-form" method="POST">
          @csrf
          <div class="row">
            <div class="sidebar-brand-text mx-3 push ml-3">
              <i class="fas fa-atlas text-primary sidebar-brand-icon rotate-n-15"></i> <b class="text-primary"> SIGESPRO</b>
            </div>
          </div>
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="row justify-content-center mt-3">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <label for="name"><b>Ente:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Nombre de ente">
                <i class="fas fa-address-card fa-lg" title="Introduzca el nombre del ente."></i>
              </div>
              <p class="campo-obligatorio">* Campo obligatorio</p>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-3 col-md-3 col-lg-3">
              <label for="document_type_id"><b>Tipo:</b></label>
              <div class="inputWithIcon">
                  <select id="document_type_id" name="document_type_id" type="text" class="form-control custom-select @error('document_type_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('document_type_id') }}">
                      <option value="0" disabled selected></option>
                    @foreach($documentType as $type)
                      <option value="{{$type->id}}">{{$type->option}}</option>
                    @endforeach
                  </select>
                  <i class="fas fa-hand-pointer fa-lg" title="Introduzca el tipo de documento."></i>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-6">
              <div class="form-group">
                <label for="identity"><b>Nº Documento:</b></label>
                <div class="inputWithIcon">
                  <input id="identity" type="text" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ $inventory->identity ?? '' }}" placeholder="Identidad">
                  <i class="fas fa-file-code fa-lg" title="Indique la identidad."></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <div class="form-group">
                <label for="email"><b>Correo:</b></label>
                <div class="inputWithIcon">
                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $inventory->email ?? '' }}" placeholder="Correo electrónico">
                    <i class="fas fa-envelope fa-lg" title="Indique el correo electrónico."></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <div class="form-group">
                <label for="web"><b>Dirección Web:</b></label>
                <div class="inputWithIcon">
                  <input id="web" type="text" class="form-control{{ $errors->has('web') ? ' is-invalid' : '' }}" name="web" value="{{ $inventory->web ?? '' }}" placeholder="Ejemplo: www.sigespro.com">
                  <i class="fas fa-globe-europe fa-lg" title="Indique la página web."></i>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-8 col-lg-8">
              <div class="form-group">
                <label for="addres"><b>Dirección Ente:</b></label>
                <div class="inputWithIcon">
                  <textarea id="addres" type="text" class="form-control{{ $errors->has('addres') ? ' is-invalid' : '' }} textarea-gris element-focus" name="addres" value="{{ $inventory->addres ?? '' }}" placeholder="Ingrese dirección. . .">{{ $inventory->addres ?? '' }}</textarea>
                  <i class="fas fa-list-alt fa-lg" title="Indique la dirección del ente."></i>
                </div>
              </div>
            </div>
          </div>
        </form>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-entity" class="btn btn-primary" ><i class="fas fa-share-square"></i><b> Guardar</b></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i>  <b>Cerrar</b></button>
      </div>
    </div>
  </div>
</div>
