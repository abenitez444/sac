<div class="modal fade" id="modal-createEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-createEmployee"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="employee">
    <div class="modal-content">
      <div class="modal-header bg-primary"><i class="fas fa-users text-white fa-lg mr-2 mt-1"></i>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="employee-form" method="POST">
          @csrf
          <div class="row">
            <div class="sidebar-brand-text mx-3 push ml-3"><i class="fas fa-atlas text-primary sidebar-brand-icon rotate-n-15"></i> <b class="text-primary"> SIGESPRO</b></div>
          </div>
          <div class="form-group text-center">
              <input type="file" class="form-control custom-file-input"  id="cv" name="cv" lang="es" accept=".png"  title="Debe adjuntar su sintesis curricular en formato PDF.">
              <img src="{{asset('img/avatar.png')}}" alt="Avatar" class="avatar" title="Cargar imagen del empleado.">
          </div>
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="row justify-content-center form-group">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido">
                <i class="fas fa-address-card fa-lg" title="Introduzca el nombre y apellido del empleado."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-3 col-lg-3 form-group">
              <div class="inputWithIcon">
                  <select id="nac" name="nac" type="text" class="form-control custom-select @error('nac') is-invalid @enderror fondo-gris element-focus" value="{{ old('nac') }}">
                      <option value="0" disabled selected></option>
                      <option value="1">V</option>
                      <option value="2">E</option>
                  </select>
                  <i class="fas fa-hand-pointer fa-lg" title="Introduzca la cédula de identidad del empleado."></i>
                </div>
              </div>
              <div class="col-sm-8 col-md-5 col-lg-7 form-group">
                <div class="inputWithIcon">
                  <input type="text" class="form-control" id="ci" name="ci" placeholder="Cédula identidad">
                  <i class="fas fa-id-card fa-lg" title="Introduzca la cédula de identidad del empleado."></i>
                </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10 form-group">
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="tlf" name="tlf" placeholder="Teléfono">
                <i class="fas fa-phone-square fa-lg" title="Introduzca el teléfono del empleado."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10 form-group">
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="mail" name="mail" placeholder="Correo electrónico">
                <i class="fas fa-envelope fa-lg" title="Introduzca el correo electrónico del empleado."></i>
              </div>
            </div>
          </div>
          <div class="form-group text-center">
              <label class="ml-2 mt-2"><b>Adjuntar CV</b></label>
            <div class="inputWithIcon">
              <input type="file" class="form-control custom-file-input"  id="cv" name="cv" placeholder="Correo electrónico" lang="es" accept=".pdf"  title="Debe adjuntar la sintesis curricular del empleado en formato PDF.">
              <i class="fas fa-cloud-upload-alt fa-3x text-primary push offset-5"></i>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i>  <b>Cerrar</b></button>
        <button type="button" id="send-employee" class="btn btn-primary" ><i class="fas fa-share-square"></i><b> Guardar</b></button>
      </div>
    </div>
  </div>
</div>
