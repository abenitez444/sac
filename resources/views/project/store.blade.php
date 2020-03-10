<div class="modal fade" id="modal-createProject" tabindex="-1" role="dialog" aria-labelledby="modal-createProject"
  aria-hidden="true">
  <div class="modal-dialog" role="project">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Registrar proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="project-form" method="POST">
          @csrf
          <input type="hidden" class="form-control" id="id" name="id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="recipient-type_id" class="col-form-label">Tipo de proyecto:</label>
            <select class="custom-select mr-sm-2" id="type_id" name="type_id">
              <option selected>Seleccione...</option>
              @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->description }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-status_id" class="col-form-label">Status:</label>
            <select class="custom-select mr-sm-2" id="status_id" name="status_id">
              <option selected>Seleccione...</option>
              @foreach($status as $statu)
                <option value="{{ $statu->id }}">{{ $statu->description }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-date_start" class="col-form-label">Fecha de inicio:</label>
            <input type="date" class="form-control" id="date_start" name="date_start">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="send-proyect" class="btn btn-primary" >Guardar</button>
      </div>
    </div>
  </div>
</div>