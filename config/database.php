<?php

function connect(){
    $db = new mysqli('localhost', 'root', 'root', 'cafeteria', 3306);

    if(mysqli_connect_error()){
        die('Ha fallado la conexion');
    }

    return $db;
}


