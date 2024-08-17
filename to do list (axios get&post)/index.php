<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <!--axios-->
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <!--bootstrap-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
  <!--fontawesome-->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css' integrity='sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==' crossorigin='anonymous'/>
  <!--vue-->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/3.4.37/vue.global.min.js' integrity='sha512-DqEEvSuoZMoX7siGBL6dqybFZeH0oCysZnIXBq9PHttRbdEWwc7tMk0nlkGhEsLJOMzk1fnNU6OYe/o3V3D61Q==' crossorigin='anonymous'></script>
  <title>TO DO</title>
</head>
<body>
  
  <div class="wrapper">
    <div id="app">
      <section class="todoapp py-3">
        <div class="container">
          <div class="row">
            <div class="col-12">

              <h1 class="text-center fw-bold text-muted">TO DO LIST</h1>

              <div class="alert alert-danger" role="alert" v-if="messageErr.length > 0">{{messageErr}}</div>
              <ul class="list-group list-group-flush border border-1 rounded">

                <li 
                v-for="(todo, index) in todos"
                @click="toggleDone(index)"
                :key="index"
                class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="w-100 h-100 task-item " :class="{'text-decoration-line-through': todo.done}"
                  >{{todo.text}}</span>
                  <span @click.stop="removeTodo(index)" class="trash badge bg-danger p-2">
                    <i class="fa-solid fa-trash"></i>
                  </span>

                </li>
                <!-- <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="w-100 h-100 task-item text-decoration-line-through">CSS</span>
                  <span class="trash badge bg-danger p-2">
                    <i class="fa-solid fa-trash"></i>
                  </span>

                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <span class="w-100 h-100 task-item">PHP</span>
                  <span class="trash badge bg-danger p-2">
                    <i class="fa-solid fa-trash"></i>
                  </span>

                </li>-->

              </ul>
            </div>
          </div>
        </div>
      </section>

      <section class="add-todo py-3">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="input-group mb-3">
                <input
                @keyup.enter="addTodo"
                v-model.trim="newTodo"
                type="text"
                class="form-control"
                placeholder="Inserisci una task"
                aria-label="Inserisci una task"
                aria-describedby="button-add"
                >
                <button
                @click="addTodo"
                type="button"
                class="btn btn-outline-warning"
                id="button-add"
                >
                  <i class="fa-solid fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script src="main/script.js"></script>
</body>
</html>