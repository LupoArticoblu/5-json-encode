<?php
$studenti = [
  [
    'nome' => 'Mario',
    'cognome' => 'Rossi'
  ],
  [
    'nome' => 'Luca',
    'cognome' => 'Bianchi'
  ],
  //inserisco nuovi studenti al nostro array...
  [
    'nome' => 'Marco',
    'cognome' => 'Verdi'
  ],
  [
    'nome' => 'Giovanni',
    'cognome' => 'Neri'
  ]
];
  
//la funzione put_contents() ci permette di scrivere in un file, usiamo json_encode() per tradurre l'array associativo in formato json e la funzione file_put_contents() per scrivere il contenuto in un file

$json_string = json_encode($studenti);
file_put_contents('studenti.json', $json_string); 
?>