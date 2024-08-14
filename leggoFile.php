<?php

//con json_decode() possiamo convertire una stringa json in un array php o variabile php.

//per leggere il contenuto di un file usiamo file_get_contents che restituirà una stringa e tramite json_decode() trsformiamo tale stringa in variabile php
$ricette_string = file_get_contents("db.json");
var_dump($ricette_string);
$ricette = json_decode($ricette_string, true);
//RICORDA: si usa true per dire alla funzione di trasfornare la stringa in un array associativo. Altrimenti restituirà un array di oggetti
var_dump($ricette);

?>