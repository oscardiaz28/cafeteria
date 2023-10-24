<?php

function connect(){
    $db = new mysqli('localhost', 'root', '', 'cafeteria', 3307);

    if(mysqli_connect_error()){
        die('Ha fallado la conexion');
    }

    return $db;
}


