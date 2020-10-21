
<div class="modal fade" id="detailExpenses" tabindex="-1" role="dialog" aria-labelledby="detailExpenses"
  aria-hidden="true">
  <div class="modal-dialog" role="expenses">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-header blue-gradient" style="border-radius: 10px;"><i class="fas fa-user-tag text-white fa-lg mr-2 mt-1"></i>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-10 col-md-12 col-lg-12  mb-lg-0 mb-5">
            <div class="card-body">
              <div class="col-md-12 mt-3">
                 <h4 class="font-weight-bold dark-grey-text text-center mb-4"> <span id="id"></span></h4>
              </div>
              <div class="col-md-12 mt-3">
                 <h4 class="font-weight-bold dark-grey-text text-center mb-4"> <span id="month"></span></h4>
              </div>
              <div class="col-md-12 mt-3">
                 <h4 class="font-weight-bold dark-grey-text text-center mb-4"> <span id="year"></span></h4>
              </div>

                <div class="row justify-content-center">
		        <div class="col-sm-12 col-md-12 col-lg-12"> 
		        <div class="container">
		          <br />
		            <div class="table-responsive">
		              <table class="table table-bordered" id="dynamic_field">
		              <tr>
		                <td id="expenditure_id" ><label><b>id</b></label></td>
		                <td id="description_monthly"><label><b>Descripción:</b></label></td>
		                <td id="type_money"><label><b>Tipo:</b></label></td>
		                <td id="amount_monthly"><label>Monto:</label></td>
		              </tr>
		              </table>
		            </div>
		          </div>
		        </div>
		      </div>
           
              <div class="col-md-12">
                <i class="fas fa-envelope dark-grey-text fa-lg" title="Correo electrónico."></i> <span id="email" class="font-weight-bold"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

