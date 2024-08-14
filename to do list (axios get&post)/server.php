<?php

$string = file_get_contents('main/db.json');
$list= json_decode($string, true);

//var_dump($list);

header('Content-type: application/json');
echo json_encode($list);

?>