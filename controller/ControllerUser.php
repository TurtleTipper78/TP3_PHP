<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


RequirePage::library('CheckSession');

RequirePage::model('CRUD');
RequirePage::model('User');
RequirePage::model('Privilege');
RequirePage::library('Validation');

class ControllerUser extends Controller {

    const ADMIN_PRIVILEGE = 1; 

    public function __construct(){
        CheckSession::sessionAuth();
        if($_SESSION['privilege'] != self::ADMIN_PRIVILEGE) {
            RequirePage::url('login');
            exit();
        }
    }

    public function index(){
        $user = new User;
        $select = $user->select(['id', 'username', 'permission']);

        $privilege = new Privilege;
        $i=0;
        foreach($select as $userData){
            $selectId = $privilege->select(['level'], ['id' => $userData['permission']]);
            $select[$i]['privilege']= $selectId[0]['level'];
            $i++;
        }
        return Twig::render('user/index.php', ['users'=>$select]);
    }

    public function create(){ 
        $privilege = new Privilege;
        $select = $privilege->select(['id', 'level']);
        return Twig::render('user/create.php', ['privileges' => $select]);
    }

    public function store(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('username')->value($username)->max(50)->required();
        $validation->name('password')->value($password)->max(255)->min(6);
        $validation->name('privilege')->value($privilege_id)->required();

        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
            $privilege = new Privilege;
            $select = $privilege->select(['id', 'level']);
            return Twig::render('user/create.php', ['errors' =>$errors, 'privileges' => $select, 'user' => $_POST]);
        }

        $user = new User;

        $options = [
            'cost' => 10
        ];
        $salt = "H3@_l?a";
        $passwordSalt = $_POST['password'].$salt;
        $_POST['password'] =  password_hash($passwordSalt, PASSWORD_BCRYPT, $options);
        
        $insert = $user->insert($_POST);

        RequirePage::url('user');
    }
}
?>
