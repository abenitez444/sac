
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
          <div class="row">
              <!--Grid column-->
              <div class="col-lg-12 col-md-12 mb-lg-0 mb-4">
                  <!--Background color-->
                  <div class="card-up info-color"></div>
                  <!--Avatar-->
                  <div class="avatar mx-auto white">
                    <img src="{{asset('/img/avatar.png')}}" class="rounded-circle img-fluid">
                  </div>
                  <div class="card-body">
                    <!--Name-->
                    <div class="row justify-content-center">
                      <div class="col-md-12">
                         <h4 class="font-weight-bold text-center mb-4 mt-3"><span id="name"></span></h4>
                          <span id="nac"></span>-
                          <span id="ci"></span> / <span id="tlf"></span>
                      </div>
                    </div>
                    <hr>
                    <!--Quotation-->
                    <p class="dark-grey-text mt-4"><i class="fa fa-quote-left pr-2"></i><span id="mail"></span>.</p>
                  </div>
              </div>
          </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12">
              <span id="name" class="font-weight-bold" style=""></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{--  <div class="modal-footer">
  </div>--}}
</div>
