<template>
  <div id="ListCreate">
    <div class="modal fade" id="CreateList" tabindex="-60" role="dialog" aria-labelledby="CreateListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CreateListLabel">Agregar nueva lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="create">     
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre de la Lista:</label>
                <input type="text" class="form-control listname" v-model="name">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["project"],
  data(){
    return {
      name: '',
    }
  },
  methods: {
    create(e) {
      let self = this;
      e.preventDefault();
      axios.post('../../list/create', {
          name : this.name,
          project_id: this.project,
          order: 99,
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
  
};
</script>
