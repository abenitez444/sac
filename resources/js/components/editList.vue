<template>
  <div id="ListEdit">
    <a class="cursor-pointer" @click="editList" data-toggle="modal" data-target="#EditList">
	  <span class="card-title text-white font-semibold font-sans tracking-wide" style="font-size:20px; text-shadow: 0px 0px 3px #000000;">{{name}}</span>
	</a>
    <div class="modal fade" id="EditList" tabindex="-1" role="dialog" aria-labelledby="EditListLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="EditListLabel">Agregar nueva lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Nombre de la Lista:</label>
              <input type="text" class="form-control listname" v-model="nameList">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button  type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["list", "name"],
  data(){
    return {
      nameList: this.name,
    }
  },
  methods: {
  	editList(){
  		console.log('hola')
  	},
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
        $('#EditList').modal('hide');
        self.$emit('newList', response.data)
      })
      .catch(function (error) {
         console.log(error);
      });
    }
  }
  
}
</script>
