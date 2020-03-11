<template>
  <div id="ListEdit">
    <div class="modal fade" id="EditList" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="EditListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditListLabel">Editar la lista: {{ list.name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de la Lista:</label>
              <input type="text" class="form-control editListname" v-model="list.name">
            </div>
          </div>
          <div class="modal-footer">
            <button @click="cancelEdit" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
  props: ["list"],
  methods: {
    updateList(e) {
      if (this.list.name) {
        let self = this;
        e.preventDefault();
        axios.post('../../kanban/list/edit', {
            id : self.list.id,
            name : self.list.name,
        })
        .then(function (response) {
          $('#EditList').modal('hide');
        })
        .catch(function (error) {
           console.log(error);
        });
      }
      else{
        toastr.error('El nombre de la lista no puede estar vacio', 'Error!');
      }
    },
    cancelEdit(e){
      let self = this;
      e.preventDefault();
      axios.post('../../kanban/list/show', {
          id : self.list.id,
      })
      .then(function (response) {
        self.list.name = response.data.name;
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
};
</script>
