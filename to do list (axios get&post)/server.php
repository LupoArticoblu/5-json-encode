<?php

$string = file_get_contents('main/db.json');
$list= json_decode($string, true);

//var_dump($list);

//se ricevo in post questa variabile, vuol dire che devo aggiungere quest'elemento all'array
if(isset($_POST['todoText'])) {
  //creo l'elemento da aggiungere
  $element = [
    'text' => $_POST['todoText'],
    'done' => false
  ];
  //lo aggiungo alla lista come elemento dell'array
  array_push($list, $element);

  //salvo il nuovo array encode in db.json
  file_put_contents('main/db.json', json_encode($list));
  
}

if(isset($_POST['toggleDone'])) {

  $list[$_POST['toggleDone']]['done'] = !$list[$_POST['toggleDone']]['done'];

  //salvo il nuovo array encode in db.json
  file_put_contents('main/db.json', json_encode($list));
  
}

if(isset($_POST['removeTodo'])) {

  unset($list[$_POST['removeTodo']]);

  //salvo il nuovo array encode in db.json
  file_put_contents('main/db.json', json_encode($list));
  
}

header('Content-type: application/json');
echo json_encode($list);

//un'altra cosa MOLTO IMPORTANTE che fa riferimento a header sono i cors: cors = cross-origin-resource-sharing, quindi risorse da più origini che puntano allo stesso server, questo non è possibile perchè si otterrebbe un problema di CORS ed un errore bloccante(403), il problema però può essere ovviato inserendo 2 header: il primo che fa riferimento al nostro localhost con questa sintassi "Access-Control-Allow-Origin: *" e il secondo che fa riferimento alle nostre risorse con questa sintassi "Access-Control-Allow-Headers: *"

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

?>