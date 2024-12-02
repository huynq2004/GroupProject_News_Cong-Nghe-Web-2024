<?php
// Import class Database
require_once 'database.php';

// Tạo đối tượng Database
$db = new Database();

// Thử kết nối
$conn = $db->connect();

if ($conn) {
    echo "Kết nối cơ sở dữ liệu thành công!";
} else {
    echo "Không thể kết nối cơ sở dữ liệu!";
}
?>
