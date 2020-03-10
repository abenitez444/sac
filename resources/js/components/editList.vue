<template>
  <div id="ListEdit">
    <div class="modal fade" id="EditList" tabindex="-1" role="dialog" aria-labelledby="EditListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditListLabel">Editar la lista: {{ listas.name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de la Lista:</label>
              <input type="text" class="form-control editListname" v-model="listas.name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button  @click="updateList" type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["listas"],
  methods: {
    updateList(e) {
      let self = this;
      e.preventDefault();
      axios.post('../../kanban/list/edit', {
          id : this.listas.id,
          name : this.listas.name,
      })
      .then(function (response) {
        $('.editListname').val('');
        $('#EditList').modal('hide');
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
};
</script>
