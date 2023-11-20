<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class ControllerHome extends Controller {

    public function index(){
      return Twig::render('home.php', ["modele_nom" => 'f2']);
    }

    public function error($e = null){
        return 'error '.$e;
    }

}

?>