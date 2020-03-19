<template>
  <div class="card" id="employees">
    <div class="card-header bg-primary" style="margin-top: -12px !important; margin-bottom: -12px !important">
    </div>
    <div class="card-header bg-white ">
      <div class="flex justify-between items-center rounded-lg">
        <a href="#" class="nav-link">
          <h5 class="h5 text-center" style="margin-top: -5px !important; margin-bottom: -5px !important">Personal</h5>
        </a>    
        <span class="badge badge-primary badge-pill cursor-default" title="Cantidad de personal">{{ this.project.employees_count }}</span>
      </div>
    </div>
    <div class="card-body">
      <ul class="w-100" v-for="(employee, index) in this.project.employees">
        <li class="p-2 mb-2 flex justify-between items-center bg-white shadow rounded-lg">
          <div class="flex items-center">
            <img class="w-10 h-10 rounded-full" src="../../img/confi.png" alt="user.name">
            <p class="ml-2 text-gray-700 font-semibold font-sans tracking-wide">{{ employee.name }}</p>
          </div>
          <div class="flex">
            <button aria-label="Eliminar" class="p-1 focus:outline-none focus:shadow-outline text-red-500 hover:text-red-600">
            <i class="fa fa-user-slash"></i>
            </button>
          </div>
        </li>
      </ul>
        <li class="p-2 mb-2 flex justify-between items-center text-primary bg-white shadow rounded-lg w-100">
          <div class="flex w-100 text-center cursor-pointer">
            <a @click="cargaEmpleado" aria-label="Eliminar" class="w-100 p-1 focus:outline-none focus:shadow-outline text-blue-500 hover:text-blue-600 ">
            <i class="fa fa-user-plus"></i> Agregar personal
            </a>
          </div>
        </li>
    </div>
  </div>
</template>

<script>
export default {
  name: "board",
  props: ['id'],
  data() {
    return {
      project: [],
      employees:[]
    };
  },
  mounted(){
    this.getEmployee();
  },
  methods:{
    getEmployee(){
      let self = this;
        axios.get('../../project/get/'+this.id)
        .then(function (response) {
          self.project = response.data.project;
          self.employees = response.data.employees;
        })
        .catch(function (error) {
           console.log("Tasks could not be retrieved "+error);
        }); 
    },
    cargaEmpleado(){
      var data = {
        id: '5',
        name : 'juan antonio'
      }
      this.project.employees.push(data);
    },
  }
};
</script>
