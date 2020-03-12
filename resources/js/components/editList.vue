<template>
  <div id="ListEdit">
    <div class="modal fade" id="EditList" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="EditListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditListLabel">Editar la lista: {{ list.name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="cancelEdit">
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
            <button @click="deletedList" type="button" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
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
  props: ["list", "indexList"],
  methods: {
    updateList(e) {
      if (this.list.name) {
        let self = this;
        e.preventDefault();
        axios.post('../../list/edit', {
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
      axios.post('../../list/show', {
          id : self.list.id,
      })
      .then(function (response) {
        self.list.name = response.data.name;
      })
      .catch(function (error) {
         console.log(error);
      });
    },
    deletedList(e){
      let self = this;
      e.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          axios.post('../../list/deleted', {
              id : self.list.id,
          })
          .then(function (response) {

            /*lista: ["icono-5-4", "icono-7-6", "icono-8-7", "icono-9-8", "icono-1-0", "icono-2-1"]
            this.lista.splice(indice, 1);
            _.pull(this.array, 'icono-9-8')*/
            self.$emit('putList', self.indexList);
            
            Swal.fire(
              'Eliminada!',
              'La lista ha sido eliminada con éxito.',
              'success'
            )
          })
          .catch(function (error) {
             Swal.fire(
              'Error!',
              'No se pudo eliminar la lista.',
              'error'
            )
          });
          
        }else{
          this.cancelEdit(e);
        }
      })
    }
  }
  
};
</script>
