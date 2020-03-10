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
        <createTask v-if="lists[0]" :lists="lists" @newTask="lists[0].tasks.push($event)"></createTask>
      </div>
    </nav>
    <div class="flex">
        <draggable :list="lists" :source="lists.id" :animation="200" group="list" class="min-h-screen flex overflow-x-scroll" @end="listsOrden">
          <div
            v-for="(list, index) in lists"
            :key="list.id"
            class="bg-gray-100 rounded-lg column-width rounded"
          >
          <div class="card bg-light mb-3 mr-1" style="max-width: 28rem;">
              <div class="card-header bg-success">
                <span class="card-title text-white font-semibold font-sans tracking-wide" style="font-size:20px; text-shadow: 0px 0px 3px #000000;">{{list.name}}</span>
              </div>
              <div class="card-body">

                <draggable :list="list.tasks" :source="list.id" :rowlist="index" :animation="200" ghost-class="ghost-card" group="tasks" @end="checkMove">
                  <task-card
                    v-for="(task) in list.tasks"
                    :key="task.id"
                    :task="task"
                    class="mt-3 cursor-move"
                  ></task-card>
                </draggable>
              </div>
            </div>
          </div>
        </draggable>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import draggable from "vuedraggable";
import TaskCard from "./task.vue";
import createList from "./createList.vue";
import createTask from "./createTask.vue";
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
      axios.post('../../kanban/moveTask', {
          id : e.item._underlying_vm_.id,
          list_id: e.to.__vue__.$attrs.source,
          tasks: this.lists[e.to.__vue__.$attrs.rowlist].tasks,
      }).then(function (response){
        console.log('move complete')
      }).catch(function (error) {
         console.log("Tasks could not be retrieved "+error);
      });
    },
    listsOrden: function(e){

      let self = this;
        axios.post('../../kanban/list/order',{
          lists: self.lists,
        })
        .then(function (response) {
          console.log('move complete')
        })
        .catch(function (error) {
           console.log("Tasks could not be retrieved "+error);
        }); 
    },
  }
};
</script>

<style scoped>
.column-width {
  min-width: 380px;
  width: 380px;
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
