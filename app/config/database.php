<?php
<<<<<<< HEAD
class DBConnection {
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn;
    public function __construct(){

        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->dbname= DB_NAME;
        
        try{
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->pass);
        }catch (PDOException $e){
            $this-> conn = null;
        }
    }
    
    public function getConnection(){
=======
class Database {
    private $host = 'localhost'; // Địa chỉ máy chủ
    private $db_name = 'news_website'; // Tên cơ sở dữ liệu
    private $username = 'root'; // Tên người dùng MySQL
    private $password = ''; // Mật khẩu MySQL
    private $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
        return $this->conn;
    }
}
?>
