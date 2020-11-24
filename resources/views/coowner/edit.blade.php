<div class="modal fade" id="modal-editCoowner" tabindex="-1" role="dialog" aria-labelledby="modal-editCoowner"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="editCo-owner">
    <div class="modal-content">
      <div class="modal-header default-color-dark"><i class="fa fa-users text-white fa-lg mr-2 mt-2" title="Registrar Copropetario."></i>
        <h5 class="modal-title text-white" id="ModalLabel">Editar: Copropetario</h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editCoowner-form">
          <input type="hidden" class="form-control" id="id" name="id">
          @csrf
          <div class="avatar mx-auto text-center">
              <input type="file" class="form-control custom-file-input"  id="avatar" name="avatar" lang="es" accept=".png"  title="Debe adjuntar el avatar.">
              <img src="{{asset('img/avatar.png')}}" alt="Avatar" class="avatar" title="Cargar avatar del copropietario.">
          </div>
          <div class="row justify-content-center mt-3">
            <div class="col-sm-6 col-md-6 col-lg-7">
              <label for="name"><b>Nombre y Apellido:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="name" name="name" placeholder="Nombre y apellido" value="{{ old('name') }}" onkeypress="return letters(event)" maxlength="60">
                <i class="fas fa-address-card fa-lg" title="Ingrese el nombre y apellido del copropetario."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-7">
             <label for="name_residence_id"><b>Residencia:</b></label>
              <div class="inputWithIcon">
                <select id="name_residence_id" name="name_residence_id" type="text" class="name_residence_id custom-select @error('name_residence_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('name_residence_id') }}">
                  <option value="0" disabled selected>Seleccione</option>
                   @foreach($residence as $res)
                    <option value="{{$res->id}}">{{$res->name_residence}}</option>
                   @endforeach
                </select>
                <i class="fas fa-building fa-lg font-weight-bold" title="Seleccione el nombre de residencia del copropetario."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4">
             <label for="type_residence_id"><b>Tipo residencia:</b></label>
              <div class="inputWithIcon">
                <select id="type_residence_id" name="type_residence_id" type="text" class="type_residence_id form-control custom-select @error('type_residence_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('type_residence_id') }}">
                  <option value="0" disabled selected>Opción</option>
                  <option value="1">Apartamento</option>
                  <option value="2">Thownhouse</option>
                  <option value="3">Casa</option>
                </select>
                <i class="fas fa-store-alt fa-lg font-weight-bold" title="Seleccione el tipo de residencia del copropetario."></i>
                <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
             <label for="type_structure_id"><b>Estructura:</b></label>
              <div class="inputWithIcon">
                <select id="type_structure_id" name="type_structure_id" type="text" class="type_structure_id form-control custom-select @error('type_structure_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('type_structure_id') }}">
                </select>
                <i class="fa fa-university fa-lg font-weight-bold" title="Seleccione el tipo de estructura de la residencia del copropetario."></i>
                 <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-4 col-md-4 col-lg-4">
             <label for="number_letters"><b>Número/Letra:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control{{ $errors->has('number_letters') ? ' is-invalid' : '' }}" id="number_letters" name="number_letters" placeholder="Hogar" maxlength="20">
                 <i class="fas fa-home fa-lg font-weight-bold" title="Ingrese el número/letra del hogar del copropetario."></i>
                  <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
           <div class="col-sm-4 col-md-4 col-lg-4 form-group">
            <label for="code_phone_id"><b>Código:</b></label>
              <div class="inputWithIcon">
                <select id="code_phone_id" name="code_phone_id" type="text" class="form-control custom-select @error('code_phone_id') is-invalid @enderror fondo-gris element-focus" value="{{ old('code_phone_id') }}">
                    <option value="0" disabled selected>Opción</option>
                    @foreach($codePhone as $code)
                    <option value="{{$code->id}}">{{$code->option}}</option>
                    @endforeach
                </select>
                <i class="fas fa-hand-pointer fa-lg" title="Seleccione el código de teléfono del copropetario."></i>
              </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 form-group">
              <label for="document_type_id"><b>Teléfono:</b></label>
              <div class="inputWithIcon">
                <input type="text"  class="form-control phone @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Número de teléfono" maxlength="7" onkeypress="return numbers(event)">
                <i class="fas fa-phone-square fa-lg" title="Introduzca el teléfono del copropetario."></i>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 col-lg-7 form-group">
              <label for="email"><b>Correo:</b></label>
              <div class="inputWithIcon">
                <input type="text" class="form-control" id="email" name="email" placeholder="Correo electrónico" maxlength="80">
                <i class="fas fa-envelope fa-lg" title="Introduzca el correo electrónico del copropetario."></i>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-editCoowner" class="btn btn-deep-orange text-white rounded font-weight-bold" title="Editar Copropetario."><i class="fas fa-share-square fa-2x"> </i></button>
      </div>
    </div>
  </div>
</div>