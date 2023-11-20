<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

RequirePage::model('CRUD');
RequirePage::model('User');
RequirePage::library('Validation');

class ControllerLogin extends controller {

    public function index(){
        Twig::render('auth/index.php');
    }

    public function auth(){
        $validation = new Validation($_POST['username'], $_POST['password']);
        $validation->name('username')->max(50)->required();
        $validation->name('password')->max(255)->min(6);
    
        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('auth/index.php', ['errors' => $errors, 'user' => $_POST]);
        }
    
        $user = new User;
        $checkUser = $user->checkUser($_POST['username'], $_POST['password']);
    
        if (is_string($checkUser)) {
            $errors = ['Verifier le mot de passe'];
            return Twig::render('auth/index.php', ['errors' => $errors, 'user' => $_POST]);
        } else {
            $_SESSION['user_id'] = $checkUser['id'];
            $_SESSION['username'] = $checkUser['username'];
            $_SESSION['privilege'] = $checkUser['privilege'];
            RequirePage::url('home');
        }
        
    
        RequirePage::url('home');
    }
    
    

    public function logout(){
        session_destroy();
        RequirePage::url('login');
    }
}
