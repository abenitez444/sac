<template>
  <div id="TaskCreate">
    <button type="button" class="ml-2 btn btn-primary" data-toggle="modal" data-target="#CreateTask" data-whatever="@getbootstrap">Agrega Tarea</button>

    <div class="modal fade" id="CreateTask" tabindex="-1" role="dialog" aria-labelledby="CreateTaskLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="CreateTaskLabel">Agregar nueva lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de la Tarea:</label>
              <input type="text" class="form-control taskname" v-model="nameTask">
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Descripcion:</label>
              <input type="text" class="form-control taskdescription" v-model="description">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button @click="createTask" type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["lists"],
  data(){
    return {
      nameTask: '',
      description: '',
    }
  },
  methods: {
    createTask(e) {
      let self = this;
      e.preventDefault();
      axios.post('../../kanban/task/create', {
          name : this.nameTask,
          description : this.description,
          list_id: this.lists[0].id,
          order: 100,
      })
      .then(function (response) {
        $('.taskname').val('');
        $('.taskdescription').val('');
        $('#CreateTask').modal('hide');
        self.$emit('newTask', response.data)
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
}
</script>
