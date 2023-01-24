<?php
require '../classes/Dbh.classe.php';
require_once '../includes/autoload.inc.php';


session_start();


if(isset($_POST['admin-login']))   login_admin(); 
if(isset($_POST['admin-register']))   register_admin(); 
if(isset($_GET['add-article']))   add_article(); 


function login_admin(){
    $email=$_POST['login-email'];
    $password=$_POST['login-password'];
    $infos=Admin::login($email,$password);
    if($infos){
        $admin=new Admin($infos[0],$infos[1],$email,$infos[2]);
        $_SESSION['admin']=$admin;
        require '../pages/dashboard.php';
        return 0;
    }
    else {
    $error='Incorrect email or password';
    require '../pages/login.php';
    }
}

function register_admin(){
    $email=$_POST['register-email'];
    $name=$_POST['register-name'];
    $password=$_POST['register-password'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error='Invalid Email';
        require '../pages/register.php';
        die;
    }
    $admin=new Admin(null,$name,$email,$password);
    $return=$admin->register();
    if($return==2)
    {   
        $error="You're already signed up";
        require '../pages/register.php';
        
    }
    else if($return==1){
        $error='You were signed up, please sign in';
        require '../pages/login.php';
    }else{
        $error='Something went wrong';
        require '../pages/login.php';
    }
}   

function add_article(){
    // print_r($_SESSION);
    $json=json_decode(file_get_contents('php://input'),true);
    foreach($json as $article){
        echo $_SESSION['admin']->add_article($article);
    }
}