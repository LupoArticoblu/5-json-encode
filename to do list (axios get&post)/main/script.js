const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      todos: []
    }
  },
  methods:{
    getTodos(){
      axios
        .get(this.apiUrl)
        .then(response => {
          console.log(response);
          this.todos = response.data;
        })
        .catch(error => {
          console.log(error);
        })
    }
  },
  mounted() {
    this.getTodos();
  },
}).mount('#app');  