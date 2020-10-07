<div class="modal fade" id="modal-updateExpenditure" tabindex="-1" role="dialog" aria-labelledby="modal-updateExpenditure"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="updateExpenditure">
    <div class="modal-content">
      <div class="modal-header blue-gradient"><i class="fa fa-users text-white fa-lg mr-2 mt-2" title="Registrar Copropetario."></i>
        <h5 class="modal-title text-white" id="ModalLabel">Editar: Registro de Gástos </h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <form id="updateExpenditure" method="POST">
       @csrf
      <input type="hidden" name="id" id="id">
      <div class="container">
        <div class="modal-body">
          <div class="row justify-content-center form-group">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <label><b>Residencia:</b></label>
              <div class="inputWithIcon">
                  <select class="form-control{{ $errors->has('residence_coowner') ? ' is-invalid' : '' }} browser-default custom-select fondo-gris element-focus" name="residence_coowner" id="residence_coowner" value="{{ old('residence_coowner') }}">
                    @foreach($residence as $res)
                    <option value="{{ $res->id }}">{{ $res->name_residence }}</option>
                    @endforeach
                  </select>
               <p class="campo-obligatorio">* Campo obligatorio</p>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-5 text-left">
                <!-- Default input -->
              <label>Año:</label>
                <select class="browser-default custom-select" id="year" name="year" value="{{ old('year') }}">
                <option  value="" disabled selected>Seleccione...</option>
              @for($anio=(date("Y")+5); 1980<=$anio; $anio--)
                <option value="{{ $anio }}">{{ $anio }}</option>
              @endfor
              </select>
              <div id="errorcontainer-ano" class='errorDiv'></div>
              </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <label><b>Mes:</b></label>
                <div class="inputWithIcon">
                    <select class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }} browser-default custom-select fondo-gris element-focus" name="month" id="month" value="{{ old('month') }}">
                      <option value="" disabled selected>Buscar. . .</option>
                      @foreach($month as $m)
                      <option value="{{ $m->id }}">{{ $m->month }}</option>
                      @endforeach
                    </select>
                 <p class="campo-obligatorio">* Campo obligatorio</p>
                </div>
            </div>
          </div>
          <div class="row justify-content-center">
        <div class="col-sm-12 col-md-12 col-lg-12"> 
        <div class="container">
          <br />
            <div class="table-responsive">
              <table class="table table-bordered" id="dynamic_field">
              <tr>
                <td id="expenditure_id" hidden><label><b>id</b></label></td>
                <td id="description_monthly"><label><b>Descripción:</b></label></td>
                <td id="type_money"><label><b>Tipo:</b></label></td>
                <td id="amount_monthly"><label>Monto:</label></td>
              </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form> 
      <div class="modal-footer justify-content-center">
        <button type="button" id="send-updateExpenditure" class="btn aqua-gradient" title="Guardar copropetario"><i class="fas fa-share-square"></i> <b>Editar</b></button>
         <a href="#" class="btn btn-info"><i class="fas fa-search font-weight-bold fa-md" title="Consultar"></i><b> Buscar</b></a>
      </div>
    </div>
  </div>
