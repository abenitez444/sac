
<div class="modal fade" id="modal-detailEmployee" tabindex="-1" role="dialog" aria-labelledby="modal-detailEmployee"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="employee">
    <div class="modal-content">
      <div class="modal-header bg-primary"><i class="fas fa-user-tag text-white fa-lg mr-2 mt-1"></i>
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
            <div class="col">
              <label>Nombre</label>
              <input type="text" id="lista" value="{{$employee[0]->name}}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
  
  </div>
</div>
