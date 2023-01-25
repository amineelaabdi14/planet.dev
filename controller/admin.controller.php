<?php
require '../classes/Dbh.classe.php';
require_once '../includes/autoload.inc.php';


session_start();


if(isset($_POST['admin-login']))   login_admin(); 
if(isset($_POST['admin-register']))   register_admin(); 
if(isset($_GET['add-article']))   add_article(); 
if(isset($_POST['add-author']))   add_author(); 
if(isset($_POST['add-category']))   add_category(); 


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
    $json=json_decode(file_get_contents('php://input'),true);
    foreach($json as $article){
        $_SESSION['admin']->add_article($article);
    }
    require '../pages/dashboard.php';
}

function  add_author(){
    $author=$_POST['author'];
    $_SESSION['admin']->add_author($author);
}

function add_category(){
    $category=$_POST['category'];
    $_SESSION['admin']->add_category($category);
}

function show_articles(){
    $articles=$_SESSION['admin']->get_articles();
    foreach($articles as $article){
        echo '<tr>
        <td>'.$article['article_title'].'</td>
        <td>'.$article['category_name'].'</td>
        <td>'.$article['author_name'].'</td>
        <td>'.$article['article_content'].'</td>
        </tr>';
    }
}
function set_categories(){
    $categories=$_SESSION['admin']->get_categories();
    foreach($categories as $category){
        echo '<option value="'.$category["category_id"].'">'.$category["category_name"].'</option>';
    }
}
function set_authors(){
    $authors=$_SESSION['admin']->get_authors();
    foreach($authors as $author){
        echo '<option value="'.$author["author_id"].'">'.$author["author_name"].'</option>';
    }
}

function show_categories(){
    $categories=$_SESSION['admin']->get_categories();
    foreach($categories as $category){
        echo '<tr>';
        echo '<td class="text-left">'.$category["category_id"].'</td>';
        echo '<td class="text-left">'.$category["category_name"].'</td>';
        echo'<td class="text-center"><i class=" text-primary fa-solid fa-pen"></i><i class="fa-solid text-danger fa-trash-can"></i></td>';
        echo '</tr>';
    }
}