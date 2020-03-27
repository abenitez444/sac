<template>
  <div id="Taskkcontainer">
    <div class="modal fade" id="taskModaledit" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="taskModaleditLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="taskModaleditLabel">Editar actividad: {{ task.name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cancelTask">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="updateTask">
            <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre de la actividad:</label>
                <input type="text" class="form-control taskname" v-model="task.name">
              </div>
              <div class="form-group">
                <label for="recipient-description" class="col-form-label">Descripcion:</label>
                <input type="text" class="form-control taskdescription" v-model="task.description">
              </div>
            </div>
            <div class="modal-footer">
              <button @click="cancelTask" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
  props: ["task", "row"],
  methods: {
    updateTask(e) {
      if (this.task.name) {
        let self = this;
        e.preventDefault();
        axios.post('../../activity/edit', {
            id : self.task.id,
            name : self.task.name,
            description : self.task.description,
        })
        .then(function (response) {
          $('#taskModaledit').modal('hide');
        })
        .catch(function (error) {
           console.log(error);
        });
      }
      else{
        toastr.error('El nombre de la actividad no puede estar vacio', 'Error!');
      }
    },
    cancelTask(e){
      let self = this;
      e.preventDefault();
      axios.post('../../activity/show', {
          id : self.task.id,
      })
      .then(function (response) {
        self.task.name = response.data.name;
        self.task.description = response.data.description;
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
};
</script>
