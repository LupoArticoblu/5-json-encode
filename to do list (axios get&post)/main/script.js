const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      todos: [],
      newTodo: '',
      newTodoDone: false
    }
  },
  methods:{
    addTodo(){
      const data = {
        todoText: this.newTodo,
        done: this.newTodoDone
      }
      //utilizziamo il metodo axios.post per inviare richieste POST
      axios
        .post(this.apiUrl, data, {
        //per poter passare dei dati in una richiesta POST al nostro script in PHP abbiamo bisogno di inviare un'oggetto FormData(). Axios lo farà per noi utilizzando un header nella richiesta
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then(response => {
          console.log(response);
          this.todos = response.data;
          this.newTodo = '';
          this.newTodoDone = false;
        })
        .catch(error => {
          console.log(error);
        })  
    },
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