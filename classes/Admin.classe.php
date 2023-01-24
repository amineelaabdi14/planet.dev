<?php
require_once 'Dbh.classe.php';
class Admin {
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id=null,$name,$email,$password){
        $this->id=$id;
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
    }

    public  function register(){
        $conn=Dbh::connect();
        $sql = "SELECT * FROM admin WHERE email = ? ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$this->email]);
        $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        Dbh::disconnect();
        if(count($data)==1) return 2;
        else{
            $newpwd=password_hash($this->password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `admin`(`name`, `email`, `password`) VALUES (?,?,?)";
            try {
                $stmt=$conn->prepare($sql);
                $stmt->execute([$this->name,$this->email,$newpwd]);
                return 1;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }
    public static function login($email,$password){
        $conn=Dbh::connect();
        $sql = "SELECT * FROM admin WHERE email = ? ";
        $stmt=$conn->prepare($sql);
        $stmt->execute([$email]);
        $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        Dbh::disconnect();
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