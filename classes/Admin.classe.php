<?php
require_once 'Dbh.classe.php';
class Admin {
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id,$name,$email,$password){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    public static function register(){

    }
    public static function login($email,$password){
        $conn=Dbh::connect();
        $sql = "SELECT * FROM admin WHERE email = ? ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email]);
        $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(count($data)==0) return false;
        if(password_verify($password,$data[0]['password'])) return [$data[0]['id'],$data[0]['name'],$data[0]['password']];
        else return false;
    }

    public function get_articles(){

    }

    public function add_article(){

    }

    public function delete_article(){
        
    }
    public function update_article($article_id){
        
    }
}