<template>
  <div class="bg-white shadow rounded px-3 pt-2 pb-3 border border-white cursor-move">
    <div class="flex justify-between">
      <a class="cursor-pointer" @click="value" data-toggle="modal" data-target="#taskModaledit"><p class="text-gray-700 font-semibold font-sans tracking-wide text-sm">{{task.name}}</p></a>
      <a class="text-danger cursor-pointer" @click="deletedTask"><i class="fas fa-trash-alt fa-md"></i></a>
    </div>
    <div class="flex mt-4 justify-between items-center">
      <span class="text-sm text-gray-600">Creado: {{task.date}}</span>
      <badge v-if="task.description" :color="badgeColor">{{task.description}}</badge>
    </div>
  </div>
</template>
<script>
import Badge from "./badge.vue";
export default {
  components: {
    Badge
  },
  props: [
  "task",
  "lists",
  'rowtask'
  ],
  computed: {
    badgeColor() {
      const mappings = {
        Diseño: "purple",
        Backend: "blue",
        Frondend: "orange",
        QA: "green",
        default: "teal",
        Urgente: "red"
      };
      return mappings[this.task.description] || mappings.default;
    }
  },
  methods:{
    value: function (){
      this.$emit('taskid', this.task);
    },
    cancelDeleted(e){
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
    },
    deletedTask(e){
      let self = this;
      e.preventDefault();
      Swal.fire({
        title: '¿Estas seguro?',
        text: "No podrás recuperar la tarea si la eliminas!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Confirmar!'
      }).then((result) => {
        if (result.value) {
          axios.post('../../activity/deleted', {
              id : self.task.id,
          })
          .then(function (response) {

            self.lists.splice(self.rowtask, 1);
            
/*            Swal.fire(
              'Eliminada!',
              'La tarea ha sido eliminada con éxito.',
              'success'
            )*/
          })
          .catch(function (error) {
             Swal.fire(
              'Error!',
              'No se pudo eliminar la tarea.',
              'error'
            )
          });
          
        }else{
          this.cancelDeleted(e);
        }
      })
    }
  }
};
</script>
