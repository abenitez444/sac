  <div class="modal fade" id="modal-createResidence" tabindex="-1" role="dialog" aria-labelledby="modal-createResidence"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="residence">
    <div class="modal-content">
      <div class="modal-header blue-gradient"><i class="fas fa-building fa-lg mr-2 mt-1 text-white" title="Seleccione el ente."></i> <h5 class="text-white font-weight-bold"> Conjunto residencial</h5>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="residence-form" method="POST">
          <input type="hidden" class="form-control" id="id" name="id">
          @csrf
          <div class="row">
            <div class="sidebar-brand-text mx-3 push ml-3">
              <i class="fas fa-atlas text-info sidebar-brand-icon rotate-n-15"></i> <b class="text-info"> GC-GCA</b>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-8">
              <label for="name_residence"><b>Conjunto residencial:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('name_residence') ? ' is-invalid' : '' }}" id="name_residence" name="name_residence" placeholder="Nombre de residencia" maxlength="60">
                <i class="fas fa-building fa-lg font-weight-bold" title="Ingrese el nombre del conjunto residencial."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <label for="type_residence"><b>Tipo:</b></label>
              <div class="inputWithIcon">
                  <select id="type_residence" name="type_residence" type="text" class="form-control custom-select @error('type_residence') is-invalid @enderror fondo-gris element-focus" value="{{ old('type_residence') }}">
                      <option value="0" disabled selected>Opción</option>
                      <option value="1">Apartamento</option>
                      <option value="2">Thownhouse</option>
                      <option value="3">Casa</option>
                  </select>
                  <i class="fas fa-hand-pointer fa-lg" title="Seleccione el tipo de residencia."></i>
                  <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="form-row justify-content-center" id="row-structure">
            <div class="col-md-6 offset-4 mt-1">
              <div class="col-md-4 text-center">
                    <label><b>Estructura:</b></label>
                  <div class="col-md-8 mb-2 pb-1 form-group" id="form-structure"></div>
              </div>
              <div class="col-md-12 form-group">
                <div class="custom-control custom-switch" id="row-bulbs">
                    <input type="checkbox" class="custom-control-input checkbox-input" id="type_center" name="type_center">
                    <label class="custom-control-label" for="type_center"> Central</label>
                </div>
                <div class="col-md-12 m-hidden form-group" id="form-type_center">
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <label for="aliquot_center"><b>Alícuota:</b></label>
                          <input id="aliquot_center" type="text" class="form-control aliquot @error('aliquot_center') is-invalid @enderror" name="aliquot_center" autocomplete="aliquot_center" maxlength="30" placeholder="%" autofocus>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="custom-control custom-switch" id="row-bulbs">
                    <input type="checkbox" class="custom-control-input checkbox-input" id="type_corner" name="type_corner">
                    <label class="custom-control-label" for="type_corner"> Esquina</label>
                </div>
                <div class="col-md-12 m-hidden form-group" id="form-type_corner">
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <label for="aliquot_corner"><b>Alícuota:</b></label>
                          <input id="aliquot_corner" type="text" class="form-control aliquot @error('aliquot_corner') is-invalid @enderror" name="aliquot_corner" value="{{ old('aliquot_corner') }}" autocomplete="aliquot_corner" maxlength="30" placeholder="%" autofocus>
                      </div>
                  </div>
                </div>
              </div>
               <div class="col-md-12 form-group">
                <div class="custom-control custom-switch" id="row-bulbs">
                    <input type="checkbox" class="custom-control-input checkbox-input" id="type_penhouse" name="type_penhouse">
                    <label class="custom-control-label" for="type_penhouse"> Pen house</label>
                </div>
                <div class="col-md-12 m-hidden form-group" id="form-type_penhouse">
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <label for="aliquot_penhouse"><b>Alícuota:</b></label>
                          <input id="aliquot_penhouse" type="text" class="form-control aliquot @error('aliquot_penhouse') is-invalid @enderror" name="aliquot_penhouse" value="{{ old('aliquot_penhouse') }}" autocomplete="aliquot_penhouse" maxlength="30" placeholder="%" autofocus>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 form-group">
                <div class="custom-control custom-switch" id="row-bulbs">
                    <input type="checkbox" class="custom-control-input checkbox-input" id="type_structure" name="type_structure">
                    <label class="custom-control-label" for="type_structure"> Otros</label>
                </div>
                <div class="col-md-12 m-hidden form-group" id="form-type_structure">
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <label for="structure"><b>Especifique:</b></label>
                          <input id="structure" type="text" class="form-control @error('structure') is-invalid @enderror" name="structure" value="{{ old('structure') }}" autocomplete="structure" maxlength="30" placeholder="Estructura" autofocus>
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <label for="aliquot_structure"><b>Alícuota:</b></label>
                          <input id="aliquot_structure" type="text" class="form-control aliquot @error('aliquot_structure') is-invalid @enderror" name="aliquot_structure" value="{{ old('aliquot_structure') }}" autocomplete="aliquot_structure" maxlength="30" placeholder="%" autofocus>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-3 col-md-3 col-lg-3 form-group">
              <label for="type_rif"><b>Tipo:</b></label>
              <div class="inputWithIcon">
                  <select id="type_rif" name="type_rif" type="text" class="form-control custom-select @error('type_rif') is-invalid @enderror fondo-gris element-focus" value="{{ old('type_rif') }}">
                      <option value="0" disabled selected>Opción</option>
                      <option value="J">J</option>
                  </select>
                  <i class="fas fa-hand-pointer fa-lg" title="Seleccione el tipo de documento."></i>
              </div>
            </div> 
            <div class="col-sm-5 col-md-5 col-lg-5 form-group">
              <label for="number_rif"><b>Número (RIF):</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('number_rif') ? ' is-invalid' : '' }}" id="number_rif" name="number_rif" placeholder="Ej: 020613018" maxlength="10" onkeypress="return numbers(event)">
                <i class="fas fa-file-invoice fa-lg" aria-hidden="true" title="Ingrese número de RIF de la residencia."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-6 col-md-6 col-lg-6 form-group">
              <label for="email_residence"><b>Correo electrónico:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('email_residence') ? ' is-invalid' : '' }}" id="email_residence" name="email_residence" placeholder="Ej: residencia@gmail.com" maxlength="80">
                <i class="fas fa-envelope fa-lg font-weight-bold" title="Ingrese el correo electrónico de la residencia."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-6 col-md-8 col-lg-8">
              <div class="form-group">
                <label for="addres"><b>Dirección:</b></label>
                <div class="inputWithIcon">
                  <textarea id="addres" type="text" class="form-control{{ $errors->has('addres') ? ' is-invalid' : '' }} textarea-gris element-focus" name="addres" value="{{ $inventory->addres ?? '' }}" placeholder="Ingrese dirección. . .">{{ $inventory->addres ?? '' }}</textarea>
                  <i class="fas fa-list-alt fa-lg" title="Ingrese la dirección de la residencia."></i>
                </div>
              </div>
            </div>
          </div>
        </form>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-residence" class="btn aqua-gradient rounded"  title="Guardar residencia."><i class="fas fa-save" aria-hidden="true"></i><b> Guardar</b></button>
      </div>
    </div>
  </div>
</div>
