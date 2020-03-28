<template>
  <div class="card" id="employeesCard">
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
        <li class="p-2 mb-2 border-left-primary flex justify-between items-center bg-white shadow rounded-lg">
          <div class="flex items-center cursor-pointer" @click="showProfile(employee)">
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
      <addEmployee :employees="this.employees" @ShowProfile="showProfile($event)"></addEmployee>
      <profile :profile="profile"></profile>
    </div>
  </div>
</template>

<script>
import addEmployee from "./addEmployee.vue";
export default {
  name: "board",
  props: ['id'],
  components: {
    addEmployee,
  },
  data() {
    return {
      project: [],
      employees:[],
      profile:[]
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
          self.employees = response.data.employee;
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
    showProfile(employee){

      $('#modal-profile').modal('show');
      this.profile = employee;
    }
  }
};
</script>
