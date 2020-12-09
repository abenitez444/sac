

<div class="modal fade" id="detailExpenses" tabindex="-1" role="dialog" aria-labelledby="detailExpenses"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="expenses">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-header info-color-dark" style="border-radius: 10px;">
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" id="closeDetail" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-10 col-md-12 col-lg-12  mb-lg-0 mb-2">
            <div class="card-body">
              <div class="col-md-12 mt-1">
                 <h4 class="font-weight-bold text-center"> <span id="id" hidden></span></h4>
              </div>
               <div class="col-lg-12 col-lg-10 col-sm-8 form-group mb-5">
                 <h3 class="font-weight-bold text-center"> <i class="fas fa-building fa-sm dark-grey-text font-weight-bold"></i> <span id="residence_coowner" class="text-center dark-grey-text"></span></h3>
              </div>
              <div class="col-lg-12 col-lg-10 col-sm-8">
                 <h5 class="dark-grey-text text-center font-weight-bold"> <span id="month" class="mr-5"></span> <span id="year" class="ml-5"></span></h5>
              </div>
            <div class="row justify-content-center">
		          <div class="col-sm-12 col-md-12 col-lg-12 form-group"> 
		           <br />
		            <div class="table-responsive">
		              <table class="table table-bordered" id="dynamic_field">
                    <thead class="text-center">
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Descripción</h6></label></th>
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Tipo</h6></label></th>
                      <th><label><h6 class="dark-grey-text  font-weight-bold">Monto</h6></label></th>
                    </thead>
		              	<tbody id="reset" >
			              <tr class="text-center">
			                <td id="expenditure_id" hidden><label><b>id</b></label></td>
			                <td id="description_monthly" class="font-weight-bold"></td>
			                <td id="type_money" class="font-weight-bold"></td>
			                <td id="amount_monthly" class="font-weight-bold"></td>
			              </tr>
		                </tbody>
		              </table>
		            </div>
                <hr>
                <hr>
                <h6 class="dark-grey-text  font-weight-bold text-right">Total de Gástos Comunes: <label id="suma_amount"></label></h6>
                <h6 class="dark-grey-text  font-weight-bold text-right">Fondo de Reserva 10%: <label id="total_amount"></label></h6>
                 <h6 class="dark-grey-text font-weight-bold text-right">Total: <label id="total_general"></label></h6>
		          </div>
		        </div>
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 form-group"> 
                <div class="table-responsive">
                  <table class="table table-bordered" id="dynamic_field2" style="border:0;">
                    <tbody>
                    <tr class="text-center">
                      <th><h6 class="dark-grey-text font-weight-bold">Estructura</h6></th>
                      <th><h6 class="dark-grey-text font-weight-bold">Alíquota</h6></th>
                      <th><h6 class="dark-grey-text font-weight-bold">Monto</h6></th>
                    </tr>
                    <tr class="text-center">
                      <td><br><label>Centrales</label> <br><br><label>Laterales</label> <br> <br><label>Penhouse</label> <br><label id="structure"></label></td>
                      <td><label id="aliquot_center"></label><br><label id="aliquot_corner"></label><br><label id="aliquot_penhouse"></label><br><label id="aliquot_structure"></label></td>
                      <td><label id="aliq_center"></label><br><label id="aliq_corner"></label><br><label id="aliq_penhouse"></label><br><label id="aliq_structure"></label></td>
                    </tr>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 form-group"> 
                  <h6 class="font-weight-bold text-center">FAVOR DEPOSITAR EN LA CUENTA CORRIENTE 01740146781464193992<br>CONDOMINIOS RESIDENCIAS (<span id="residence_coowner"></span>) / BCO.BANPLUS</h6>
                </div>
              </div>
             <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
