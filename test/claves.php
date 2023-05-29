<?php
$claveOriginal = "jesuscc";
$claveEncriptada = password_hash($claveOriginal, PASSWORD_BCRYPT);

var_dump($claveEncriptada);

?>