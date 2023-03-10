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
    public function get_admins(){
        $conn=Dbh::connect();
        try {
            $sql="SELECT  * FROM admin";
            $stmt=$conn->query($sql);
            $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {  
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function get_articles(){
        $conn=Dbh::connect();
        try {
            $sql="SELECT  `article_id`,`article_title`, `article_content`, categories.category_name,categories.category_id, authors.author_name,authors.author_id  FROM `articles` INNER JOIN `categories`on category_id=article_category INNER JOIN `authors`on author_id=article_author ";
            $stmt=$conn->query($sql);
            $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {  
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }

    public function add_article($article){
        $conn=Dbh::connect();
        try {
            // $sql="INSERT INTO `articles`( `article_title`, `article_content`, `article_category`, `article_author`) VALUES (?,?,?,?)";
            $sql="INSERT INTO `articles`( `article_title`, `article_content`, `article_category`, `article_author`) VALUES ('".$article['name']."','".$article['content']."',10,1)";
            echo $sql;
            $stmt=$conn->query($sql);
            // $stmt->execute([$article['name'],$article['content'],5,1]);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }

    public function delete_article($id){
        $conn=Dbh::connect();
        try {
            $sql="DELETE FROM articles WHERE article_id=?";
            $stmt=$conn->prepare($sql);
            $stmt->execute([$id]);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function update_article($article){
        $conn=Dbh::connect();
        try {
            $sql="UPDATE articles SET article_title=?,article_content=?,article_category=?,article_author=? WHERE article_id=?";
            $stmt=$conn->prepare($sql);
            $stmt->execute([$article['title'],$article['content'],$article['category'],$article['author'],$article['id']]);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function add_author($author){
        $conn=Dbh::connect();
        try {
            $sql="INSERT INTO `authors`( `author_name`) VALUES (?)";
            $stmt=$conn->prepare($sql);
            $stmt->execute([$author]);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function add_category($category){
        $conn=Dbh::connect();
        try {
            $sql="INSERT INTO `categories`( `category_name`) VALUES (?)";
            $stmt=$conn->prepare($sql);
            $stmt->execute([$category]);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }

    public function get_categories(){
        $conn=Dbh::connect();
        try {
            $sql="SELECT * FROM categories";
            $stmt=$conn->query($sql);
            $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function get_authors(){
        $conn=Dbh::connect();
        try {
            $sql="SELECT * FROM authors";
            $stmt=$conn->query($sql);
            $data=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $data;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function edit_category($id,$name){
        $conn=Dbh::connect();
        try {
            $sql="UPDATE categories SET category_name='$name' where category_id=$id";
            $stmt=$conn->query($sql);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
    public function delete_category($id){
        $conn=Dbh::connect();
        try {
            $sql="DELETE FROM categories WHERE category_id=$id";
            $stmt=$conn->query($sql);
            return true;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }

    public function get_stats($stat){
        $conn=Dbh::connect();
        try {
            $sql="SELECT * FROM $stat";
            $stmt=$conn->query($sql);
            $stats=$stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $stats;
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return false;
        }finally{
             Dbh::disconnect();
        }
    }
}