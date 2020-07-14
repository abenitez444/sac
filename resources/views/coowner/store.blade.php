<div class="modal fade" id="modal-createCo-owner" tabindex="-1" role="dialog" aria-labelledby="modal-createCo-owner"
  aria-hidden="true">
  <div class="modal-dialog modal-md" role="co-owner">
    <div class="modal-content">
      <div class="modal-header bg-gradient-info"><i class="fa fa-users text-white fa-lg mr-2 mt-2" title="Registrar Copropetario."></i>
        <h5 class="modal-title text-white" id="ModalLabel">Copropetario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="co-owner-form" method="POST">
          @csrf
          <div class="avatar mx-auto text-center">
              <input type="file" class="form-control custom-file-input"  id="avatar" name="avatar" lang="es" accept=".png"  title="Debe adjuntar el avatar.">
              <img src="{{asset('img/avatar.png')}}" alt="Avatar" class="avatar" title="Cargar avatar del empleado.">
          </div>
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-10">
              <label for="document_type_id"><b>Copropetario:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido" onkeypress="return letters(event)" maxlength="60">
                <i class="fas fa-address-card fa-lg" title="Introduzca el nombre y apellido del empleado."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4 form-group">
              <label for="aliquot"><b>Alícuota:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="aliquot" name="aliquot" placeholder="Alícuota" onkeypress="return numbers(event)" maxlength="9">
                 <i class="p-2 font-weight-bold" title="Introduzca la identidad del empleado."><b>%</b></i>
              </div>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-6 form-group">
              <label for="saldo"><b>Saldo:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="saldo" name="saldo" placeholder="Identidad" onkeypress="return numbers(event)" maxlength="9">
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
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-co-owner" class="bg-gradient-info text-white rounded"><i class="fas fa-save"></i><b> Guardar</b></button>
      </div>
    </div>
  </div>
</div>