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

//con json_decode() possiamo convertire una stringa json in un array php o variabile php.

//per leggere il contenuto di un file usiamo file_get_contents che restituirà una stringa e tramite json_decode() trsformiamo tale stringa in variabile php
$ricette_string = file_get_contents("db.json");
var_dump($ricette_string);
$ricette = json_decode($ricette_string, true);
//RICORDA: si usa true per dire alla funzione di trasfornare la stringa in un array associativo. Altrimenti restituirà un array di oggetti
var_dump($ricette);

//la funzione put_contents() ci permette di scrivere in un file, usiamo json_encode() per tradurre l'array associativo in formato json e la funzione file_put_contents() per scrivere il contenuto in un file

$json_string = json_encode($studenti);
file_put_contents('studenti.json', $json_string);
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>