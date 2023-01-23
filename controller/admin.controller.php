<?php
require '../classes/Dbh.classe.php';
require_once '../includes/autoload.inc.php';
if(isset($_POST['admin-login']));   login_admin(); 


function login_admin(){
    $email=$_POST['login-email'];
    $password=$_POST['login-password'];
    $infos=Admin::login($email,$password);
    if($infos){
        $admin=new Admin($infos[0],$infos[1],$email,$infos[2]);
        require '../pages/dashboard.php';
        return 0;
    }
    else {
    $error='Incorrect email or password';
    require '../pages/login.php';
    }
}