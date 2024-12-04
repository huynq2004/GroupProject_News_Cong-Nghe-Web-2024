<?php
require_once APP_ROOT . '/app/config/database.php'; 
require_once APP_ROOT . '/app/config/config.php';

class User {
    private $conn;

    public function __construct() {

        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
        if ($this->conn === null) {
            throw new Exception('Unable to connect to the database');
        }
    }

    public function checkAdminLogin($username, $password) {
        try {
            if ($this->conn instanceof PDO) {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username AND role = 1");
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->execute();

                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && $user['password'] === $password) {
                    return true;
                }
                return false;
            } else {
                throw new Exception('Database connection is not valid.');
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    

}
?>
