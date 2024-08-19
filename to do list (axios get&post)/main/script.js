const { createApp } = Vue;

createApp({
  data() {
    return {
      apiUrl: 'server.php',
      todos: [],
      newTodo: '',
      newTodoDone: false,
      messageErr: '',
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
      this.messageErr = '';
      axios
        .get(this.apiUrl)
        .then(response => {
          console.log(response);
          this.todos = response.data;
        })
        .catch(error => {
          console.log(error);
        })
    },
    toggleDone(index){
      this.messageErr = '';
      const data = new FormData();
      data.append('toggleDone', index);

      axios
        .post(this.apiUrl, data)
        .then(response => {
          console.log(response);
          this.todos = response.data;
        })
        
    },
    removeTodo(index) {
      this.messageErr = '';
      if (!this.todos[index].done) {
        this.messageErr = 'Non puoi rimuovere un elemento non completato';
      } else {
        Swal.fire({
          title: 'Sei sicuro?',
          text: 'Sei sicuro di voler eliminare "' + this.todos[index].text + '"?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sì, elimina!',
          cancelButtonText: 'Annulla'
        }).then((result) => {
          if (result.isConfirmed) {
            const data = new FormData();
            data.append('removeTodo', index);
    
            axios.post(this.apiUrl, data)
              .then(response => {
                this.todos = response.data;
                Swal.fire(
                  'Eliminato!',
                  'La task è stata eliminata.',
                  'success'
                );
              })
              .catch(error => {
                console.log(error);
              });
          }
        });
      }
    }
  },
  mounted() {
    this.getTodos();
  },
}).mount('#app');  