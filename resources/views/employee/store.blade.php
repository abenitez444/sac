<div class="modal fade" id="modal-createEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-createEmployee"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="employee">
    <div class="modal-content">
      <div class="modal-header bg-primary"><i class="fas fa-users text-white fa-lg mr-2 mt-2"></i>
        <h5 class="modal-title text-white" id="ModalLabel">Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="employee-form" method="POST">
          @csrf
          <div class="row">
            <div class="sidebar-brand-text mx-3 push ml-3">
              <i class="fas fa-atlas text-primary sidebar-brand-icon rotate-n-15"></i> <b class="text-primary"> SIGESPRO</b>
            </div>
          </div>
          <div class="avatar mx-auto text-center">
              <input type="file" class="form-control custom-file-input"  id="avatar" name="avatar" lang="es" accept=".png"  title="Debe adjuntar el avatar.">
              <img src="{{asset('img/avatar.png')}}" alt="Avatar" class="avatar" title="Cargar avatar del empleado.">
          </div>
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <label for="document_type_id"><b>Nombres:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido" onkeypress="return letters(event)" maxlength="60">
                <i class="fas fa-address-card fa-lg" title="Introduzca el nombre y apellido del empleado."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
           <div class="col-sm-8 col-md-4 col-lg-4 form-group">
            <label for="document_type_id"><b>Tipo:</b></label>
            <div class="inputWithIcon">
                <select id="document_type_id" name="document_type_id" type="text" class="form-control custom-select @error('document_type_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('document_type_id') }}">
                    <option value="0" disabled selected></option>
                  @foreach($typeDocument as $type)
                    <option value="{{$type->id}}">{{$type->option}}</option>
                  @endforeach
                </select>
                <i class="fas fa-hand-pointer fa-lg" title="Seleccione el tipo de documento del empleado."></i>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-6 form-group">
              <label for="ci"><b>Nº Documento:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="ci" name="ci" placeholder="Identidad" onkeypress="return numbers(event)" maxlength="9">
                 <i class="fas fa-id-card fa-lg" title="Introduzca la identidad del empleado."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
           <div class="col-sm-8 col-md-4 col-lg-4 form-group">
            <label for="code_phone_id"><b>Código:</b></label>
            <div class="inputWithIcon">
                <select id="code_phone_id" name="code_phone_id" type="text" class="form-control custom-select @error('code_phone_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('code_phone_id') }}">
                    <option value="0" disabled selected></option>
                  @foreach($codePhone as $code)
                    <option value="{{$code->id}}">{{$code->option}}</option>
                  @endforeach
                </select>
                <i class="fas fa-hand-pointer fa-lg" title="Seleccione el código de teléfono del empleado."></i>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-6 form-group">
              <label for="document_type_id"><b>Teléfono:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Número de teléfono" onkeypress="return numbers(event)"  maxlength="7">
                <i class="fas fa-phone-square fa-lg" title="Introduzca el teléfono del empleado."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10 form-group">
              <label for="document_type_id"><b>Correo:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico">
                <i class="fas fa-envelope fa-lg" title="Introduzca el correo electrónico del empleado."></i>
              </div>
            </div>
          </div>
          <div class="form-group text-center">
              <label class="ml-2 mt-2"><b>Adjuntar CV</b></label>
            <div class="inputWithIcon">
              <input type="file" class="form-control custom-file-input"  id="curriculum" name="curriculum" lang="es" accept=".pdf"  title="Debe adjuntar la sintesis curricular del empleado en formato PDF.">
              <i class="fas fa-cloud-upload-alt fa-3x text-primary push offset-5"></i>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-employee" class="btn btn-primary" ><i class="fas fa-share-square"></i><b> Guardar</b></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i>  <b>Cerrar</b></button>
      </div>
    </div>
  </div>
</div>
