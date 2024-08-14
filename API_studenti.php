<?php
//vediamo come far comunicare php con js attraverso la codifica json
$studenti = [
  [
    'nome' => 'Mario',
    'cognome' => 'Rossi'
  ],
  [
    'nome' => 'Luca',
    'cognome' => 'Bianchi'
  ],
];
//la funzione json_encode() ci permette di convertire un array in una stringa json(oggetti)

//per poter far leggere correttamente i dat js specifichiamo che le informazioni sono di tipo json, per farlo si usa la funzione header(), che aggiunge le intestazioni indicate nella risposta HTTP

header('Content-Type: application/json');
echo json_encode($studenti);


?>

