<template>
  <div id="AddEmployee">
    <li class="p-2 mb-2 flex justify-between items-center text-primary bg-white shadow rounded-lg w-100">
      <div class="flex w-100 text-center cursor-pointer">
        <a aria-label="Eliminar" class="w-100 p-1 focus:outline-none focus:shadow-outline text-blue-500 hover:text-blue-600" data-toggle="modal" data-target="#AddEmployeeModal">
        <i class="fa fa-user-plus"></i> Agregar personal
        </a>
      </div>
    </li>
    <div class="modal fade" id="AddEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="AddEmployeeLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddEmployeeLabel">Lista de personal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- <form @submit.prevent="addEmployee"> -->
            <div class="modal-body">
              <div class="inputWithIcon w-100 mb-2">
                <input type="text" class="form-control form-control-sm" placeholder="Filtral" maxlength="60" v-model="filter">
                <i class="fas fa-search fa-lg" title="Filtral Empleados"></i>
              </div>
              <ul class="w-100" v-for="(employee, index) in filterList">
                <li class="p-1 mb-1 flex justify-between items-center bg-white shadow rounded-lg">
                  <div class="items-center">
                    <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{ employee.name }}</p>
                    <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{ employee.ci }}</p>
                  </div>
                </li>
              </ul>
<!--               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre de la Tarea:</label>
                <input type="text" class="form-control taskname" v-model="nameTask">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                <input type="text" class="form-control taskdescription" v-model="description">
              </div> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button @click="console" class="btn btn-primary">Guardar</button>
            </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  props: ["employees"],
  data(){
    return {
      nameTask: '',
      description: '',
      filter: '',
    }
  },
  computed: {
    filterList() {
      return this.employees.filter(lists => {
        const filter = this.filter.toUpperCase();
        const hasIdMatch = String(lists.id).includes(filter);
        const hasNameMatch = lists.name.toUpperCase().includes(filter);
        
        return hasIdMatch || hasNameMatch;
      })
    }
  },
  methods: {
    addEmployee(e) {
      let self = this;
      e.preventDefault();
      axios.post('../../activity/create', {
          name : this.nameTask,
          description : this.description,
          list_id: this.lists[0].id,
          order: 100,
      })
      .then(function (response) {
        $('.taskname').val('');
        $('.taskdescription').val('');
        $('#AddEmployee').modal('hide');
        self.$emit('newTask', response.data)
      })
      .catch(function (error) {
         console.log(error);
      });
    },
    console(){
      console.log(this.employees);
    }
  }
  
};
</script>
