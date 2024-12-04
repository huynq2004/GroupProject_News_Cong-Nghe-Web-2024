<?php
require_once APP_ROOT . '/app/config/database.php';
require_once APP_ROOT . '/app/models/User.php';

class UserService
{
    public function authenticate($username, $password)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            // Truy vấn kiểm tra thông tin đăng nhập
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password); // Nên sử dụng mật khẩu được mã hóa trong thực tế
            $stmt->execute();

            $row = $stmt->fetch();

            if ($row) {
                return new User($row['username'], $row['password'], $row['role']);
            } else {
                return null; // Sai username hoặc password
            }
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
            return null;
        }
    }

    public function isAdmin($username)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            // Truy vấn kiểm tra role của user
            $sql = "SELECT role FROM users WHERE username = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            $row = $stmt->fetch();

            if ($row && $row['role'] === 1) {
                return true;
            } else {
                return false; // Không phải admin
            }
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
            return false;
        }
    }
}
