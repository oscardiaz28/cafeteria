<?php

function debug($value){
    echo "<pre>";var_dump($value);echo "<pre>";exit;
}

function isAuth(){
    if(!isset($_SESSION['login'])){
        return false;
    }else{
        return true;
    }
}

function isAdmin(){
    if(!isset($_SESSION['admin'])){
        return false;
    }else{
        return true;
    }
}