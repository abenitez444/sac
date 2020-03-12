<template>
  <div class="bg-white shadow rounded px-3 pt-2 pb-3 border border-white cursor-move">
    <div class="flex justify-between">
      <p class="text-gray-700 font-semibold font-sans tracking-wide text-sm">{{task.name}}</p>
      <a class="text-primary cursor-pointer" @click="value"><i class="fas fa-edit fa-md"></i></a>
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
  props: {
    task: {
      type: Object,
      default: () => ({})
    }
  },
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
    }
  }
};
</script>
