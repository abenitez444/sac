
<div class="modal fade" id="modal-detailEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-detailEmployee"
  aria-hidden="true">
  <div class="modal-dialog" role="employee">
    <div class="modal-content" style="border-radius: 10px;">
      <div class="modal-header bg-primary" style="border-radius: 10px;"><i class="fas fa-user-tag text-white fa-lg mr-2 mt-1"></i>
        <h5 class="modal-title text-white" id="ModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span><i class="fas fa-window-close text-danger fa-md"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="sidebar-brand-text mx-3 push ml-3">
            <i class="fas fa-atlas text-primary sidebar-brand-icon rotate-n-15"></i> <b class="text-primary"> SIGESPRO</b>
          </div>
       
              <!--Grid column-->
        <div class="col-lg-12 col-md-12 mb-lg-0 mb-5">
          <!--Background color-->
            <div class="card-up info-color"></div>
          <!--Avatar-->
            <div class="avatar mx-auto white">
              <img src="{{asset('/img/avatar.png')}}" class="rounded-circle img-fluid" style=" border: 2px solid #aaa;">
            </div>
            <div class="card-body">
              <!--Name-->
                <div class="col-md-12 mt-3">
                   <h4 class="font-weight-bold text-center mb-4"><span id="name"></span></h4>
                   <i class="fas fa-id-card text-primary fa-lg" title="Cédula de identidad."></i> <span id="nac" class="font-weight-bold mt-3"></span>-
                    <span id="ci" class="font-weight-bold mt-3"></span> 
                </div>
              <hr>
                <div class="col-md-12">
                    <i class="fas fa-phone-square text-primary fa-lg" title="Teléfono"></i> <span id="tlf" class="font-weight-bold"></span>
                </div>
              <hr>
              <!--Quotation-->
              <div class="col-md-12">
                <p class="dark-grey-text "><i class="fas fa-envelope text-primary fa-lg" title="Correo electrónico"></i> <span id="mail" class="font-weight-bold"></span>.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

