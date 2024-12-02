<?php
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

        return $this->conn;
    }
}
?>
