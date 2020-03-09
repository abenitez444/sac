<template>
  <div class="kanban-board">
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow-lg rounded mb-2">
      <span class="navbar-brand">{{ this.name }}</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">

        </ul>
        <span class="text-white font-weight-bold">
          TIPO: {{ this.type }}
        </span>
        <createList :proyect="proyect" @newList="lists.push($event)"></createList>
      </div>
    </nav>
    <div class="flex">
      <div class="min-h-screen flex overflow-x-scroll">
        <div
          v-for="list in lists"
          :key="list.name"
          class="bg-gray-100 rounded-lg column-width rounded"
        >
        <div class="card bg-light mb-3 mr-1" style="max-width: 28rem;">
            <div class="card-header bg-success">
              <span class="card-title text-white font-semibold font-sans tracking-wide" style="font-size:20px; text-shadow: 0px 0px 3px #000000;">{{list.name}}</span>
            </div>
            <div class="card-body">
              <!-- Draggable component comes from vuedraggable. It provides drag & drop functionality -->
              <draggable :list="list.tasks" :source="list.id" :animation="200" ghost-class="ghost-card" group="tasks" :move="checkMove">
                <!-- Each element from here will be draggable and animated. Note :key is very important here to be unique both for draggable and animations to be smooth & consistent. -->
                <task-card
                  v-for="(task) in list.tasks"
                  :key="task.id"
                  :task="task"
                  class="mt-3 cursor-move"
                ></task-card>
                <!-- </transition-group> -->
              </draggable>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import draggable from "vuedraggable";
import TaskCard from "./task.vue";
import createList from "./createList.vue";
export default {
  name: "board",
  props: ['proyect', 'name', 'type'],
  components: {
    TaskCard,
    draggable,
    createList
  },
  data() {
    return {
      lists: [],
       
    };
  },
  mounted(){
    this.getLists();
  },
  methods:{
    getLists(){
      let self = this;
        axios.get('../../kanban/list/'+this.proyect)
        .then(function (response) {
          self.lists = response.data;
        })
        .catch(function (error) {
           console.log("Tasks could not be retrieved "+error);
        }); 
    },
    checkMove: function(e) {
      console.log(e.relatedContext.component.$attrs.source);
    }
  }
};
</script>

<style scoped>
.column-width {
  min-width: 400px;
  width: 400px;
}
/* Unfortunately @apply cannot be setup in codesandbox, 
but you'd use "@apply border opacity-50 border-blue-500 bg-gray-200" here */
.ghost-card {
  opacity: 0.5;
  background: #F7FAFC;
  border: 1px solid #4299e1;
}
.navbar-dark{
  margin-top: -30px !important;
}
</style>
