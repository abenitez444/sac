<template>
  <div class="kanban-board">
    <nav class="navbar navbar-expand navbar-light bg-gray-400 topbar mb-3 static-top shadow-lg rounded">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <span class="navbar-brand font-weight-bold text-dark">{{ this.name }}</span>
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-dark font-weight-bold">Opciones</span>
            <img class="img-profile rounded-circle" src="../img/confi.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#CreateList" >
              <i class="fas fa-clipboard-list fa-sm fa-fw mr-2 text-blue-400"></i>
              Agregar Lista
            </a>
            <a v-if="lists[0]" class="dropdown-item" href="#" data-toggle="modal" data-target="#CreateTask">
              <i class="fas fa-tasks fa-sm fa-fw mr-2 text-blue-400"></i>
              Agreagar Tarea
            </a>
            <div class="dropdown-divider"></div>
          </div>
        </li>
      </ul>
    </nav>

    <div class="flex">
      <draggable :list="lists" :source="lists.id" :animation="200" group="list" class="min-h-screen flex overflow-x-scroll" @end="listsOrden">
        <div
          v-for="(list, index) in lists"
          :key="list.id"
          class="bg-gray-100 rounded-lg column-width rounded"
        >
          <div class="card bg-light mb-3 mr-1" style="max-width: 28rem;">
            <div class="card-header bg-blue-500 cursor-move">
            <a class="cursor-pointer" @click="editLists(index)" data-toggle="modal" data-target="#EditList">
              <span class="card-title text-white font-semibold font-sans tracking-wide" style="font-size:20px; text-shadow: 0px 0px 3px #000000;">{{list.name}}</span>
            </a>

            </div>
            <div class="card-body">
              <draggable :list="list.tasks" :source="list.id" :rowlist="index" :animation="200" ghost-class="ghost-card" group="tasks" @end="checkMove">
                <task-card
                  v-for="(task, row) in list.tasks"
                  :key="task.id"
                  :task="task"
                  :rowlisk="index"
                  :rowtask="row"
                  :lists="list.tasks"
                  class="mt-3"
                  @taskid="taskList = $event"
                  @putList="list.splice($event, 1)"
                ></task-card>
              </draggable>
            </div>
          </div>
        </div>
      </draggable>
    </div>
    <createTask :lists="lists" @newTask="lists[0].tasks.push($event)"></createTask>
    <createList :project="project" @newList="lists.push($event)"></createList>
    <editList :list="listEdit" :indexList="indexList" @putList="lists.splice($event, 1)"></editList>
    <editTask :task="taskList"></editTask>
  </div>
</template>

<script>
import axios from 'axios';
import draggable from "vuedraggable";
import TaskCard from "./task.vue";
import createList from "./createList.vue";
import editList from "./editList.vue";
import createTask from "./createTask.vue";
import editTask from "./editTask.vue";
export default {
  name: "board",
  props: ['project', 'name'],
  components: {
    draggable,
    TaskCard,
    createList,
    editList,
    createTask,
    editTask,

  },
  data() {
    return {
      lists: [],
      listEdit: '',
      indexList: '',
      indexTask:'',
      taskList: [],
    };
  },
  mounted(){
    this.getLists();
  },
  methods:{
    getLists(){
      let self = this;
        axios.get('../../list/index/'+this.project)
        .then(function (response) {
          self.lists = response.data;
        })
        .catch(function (error) {
           console.log("Tasks could not be retrieved "+error);
        }); 
    },
    checkMove: function(e) {
      axios.post('../../activity/move', {
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
        axios.post('../../list/move',{
          lists: self.lists,
        })
        .then(function (response) {
          console.log('move complete')
        })
        .catch(function (error) {
           console.log("Tasks could not be retrieved "+error);
        }); 
    },
    editLists: function(index){
      this.listEdit = this.lists[index];
      this.indexList = index;
    }
  }
};
</script>

<style scoped>
.column-width {
  min-width: 380px;
  width: 380px;
}
.ghost-card {
  opacity: 0.5;
  background: #F7FAFC;
  border: 1px solid #4299e1;
}
.navbar-light{
  margin-top: -30px !important;
}
.img-profile{
  width: 30px;
  height: 30px;
}
</style>
