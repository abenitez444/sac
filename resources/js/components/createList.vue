<template>
  <div id="ListCreate">
    <button type="button" class="ml-2 btn btn-info" data-toggle="modal" data-target="#CreateList" data-whatever="@getbootstrap">Agrega Lista</button>

    <div class="modal fade" id="CreateList" tabindex="-1" role="dialog" aria-labelledby="CreateListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CreateListLabel">Agregar nueva lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de la Lista:</label>
              <input type="text" class="form-control listname" v-model="name">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button @click="create" type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["proyect"],
  data(){
    return {
      name: '',
    }
  },
  methods: {
    create(e) {
      let self = this;
      e.preventDefault();
      axios.post('../../kanban/list/create', {
          name : this.name,
          proyect_id: this.proyect,
          order: 100,
      })
      .then(function (response) {
        $('.listname').val('');
        $('#CreateList').modal('hide');
        self.$emit('newList', response.data)
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
}
</script>
