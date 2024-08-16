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

header('Content-type: application/json');
echo json_encode($list);

?>