
<div class="modal fade" id="modal-editResidence" tabindex="-1" role="dialog" aria-labelledby="modal-editResidence"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="residence">
    <div class="modal-content">
      <div class="modal-header bg-gradient-dark"><i class="fas fa-building fa-lg mr-2 mt-1 text-white" title="Seleccione el ente."></i> <h5 class="text-white font-weight-bold">Editar: Conjunto residencial</h5>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editResidence-form" method="POST">
          <input type="hidden" class="form-control" id="id" name="id" value="{{ $res->id }}" >
          @csrf
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-8">
              <label for="name_residence"><b>Conjunto residencial:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('name_residence') ? ' is-invalid' : '' }}" id="name_residence" name="name_residence" placeholder="Nombre de residencia" maxlength="60">
                <i class="fas fa-building font-weight-bold" title="Ingrese el nombre del conjunto residencial."></i>
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
                  <i class="fas fa-hand-pointer fa-lg" title="Introduzca el tipo de documento."></i>
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
           
              <div class="col-md-12 mt-2 form-group">
                  <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="type_center" name="type_center">
                      <label class="custom-control-label" for="type_center"> Central</label>
                  </div>
              </div>

              <div class="col-md-12 form-group">
                  <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="type_corner" name="type_corner">
                      <label class="custom-control-label" for="type_corner"> Esquina</label>
                  </div>
              </div>
             
               <div class="col-md-12 form-group">
                  <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="type_penhouse" name="type_penhouse">
                      <label class="custom-control-label" for="type_penhouse"> Pen House</label>
                  </div>
              </div>

              <div class="col-md-12 form-group">
                <div class="custom-control custom-switch" id="row-bulbs">
                    <input type="checkbox" class="custom-control-input checkbox-input" id="type_structure" name="type_structure">
                    <label class="custom-control-label" for="type_structure"> Otros</label>
                </div>
                <div class="col-md-12 form-group" id="form-type_structure">
                  <div class="form-row">
                      <div class="col-md-6 mt-3">
                          <input id="structure"  name="structure" type="text" class="form-control @error('structure') is-invalid @enderror m-hidden" value="{{ old('structure') }}" autocomplete="structure" maxlength="30" placeholder="Estructura" autofocus>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-2 col-md-2 col-lg-2 form-group">
              <label for="type_rif"><b>Tipo:</b></label>
              <div class="inputWithIcon">
                  <select id="type_rif" name="type_rif" type="text" class="form-control custom-select @error('type_rif') is-invalid @enderror fondo-gris element-focus" value="{{ old('type_rif') }}">
                      <option value="0" disabled selected></option>
                      <option value="J">J</option>
                  </select>
                  <i class="fas fa-hand-pointer fa-lg" title="Introduzca el tipo de documento."></i>
                  <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5">
              <label for="number_rif"><b>Número (RIF):</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('number_rif') ? ' is-invalid' : '' }}" id="number_rif" name="number_rif" placeholder="N° - Ej:123456789" maxlength="60">
                <i class="fas fa-building font-weight-bold" title="Ingrese rif de la residencia."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <!--<div class="row text-center mt-2" id="council">
              <div class="col-md-12">
                 <label><b>Gastos comunes</b></label>
              </div>

              <div class="col-md-12">
                  <a href="javascript:void(0);" class="add_button" title="Add field"><i class="btn btn-outline-info fas fa-plus form-group"></i></a>
              </div>
         
              <div class="col-md-12 field_wrapper">
              </div>

              <script type="text/javascript">
                  var removeROW = function (x){
                      $('#row'+x).remove();
                      x--;
                  }
              </script>
          </div>-->
         
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-8 col-lg-8">
              <div class="form-group">
                <label for="addres"><b>Dirección:</b></label>
                <div class="inputWithIcon">
                  <textarea id="addres" type="text" class="form-control{{ $errors->has('addres') ? ' is-invalid' : '' }} textarea-gris element-focus" name="addres" value="{{ $inventory->addres ?? '' }}" placeholder="Ingrese dirección. . .">{{ $inventory->addres ?? '' }}</textarea>
                  <i class="fas fa-list-alt fa-lg" title="Indique la dirección del ente."></i>
                </div>
              </div>
            </div>
          </div>
        </form>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-editResidence" class="btn btn-info" ><i class="fas fa-share-square"></i><b> Guardar</b></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i>  <b>Cerrar</b></button>
      </div>
    </div>
  </div>
</div>
