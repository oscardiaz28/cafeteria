<?php

namespace Router;

class Router{

    private $rutasGet = [];
    private $rutasPost = [];

    public function get($path, $fn){
        $this->rutasGet[$path] = $fn;
    }

    public function post($path, $fn){
        $this->rutasPost[$path] = $fn;
    }

    public function run(){
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Ruta solicitada

        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $fn = $this->rutasGet[$url] ?? null;
         }else{
            $fn = $this->rutasPost[$url] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            $this->render('error/error404');
        }
    }

    public function render($vista, $data = []){
        
        foreach($data as $key => $value){
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/{$vista}.php";
        $contenido = ob_get_clean();
        
        include __DIR__ . '/views/layout.php';
    }

}