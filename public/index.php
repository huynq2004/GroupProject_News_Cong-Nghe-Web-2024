<?php
require_once('../app/config/config.php');
require_once APP_ROOT . '/app/config/database.php';
//Dùng để test controller
require_once APP_ROOT . '/app/controllers/NewsController.php';

$controller = new NewsController();

// Kiểm tra nếu có yêu cầu tìm kiếm
if (isset($_GET['q'])) {
    $controller->searchAction(); // Xử lý tìm kiếm
} else {
    $controller->index(); // Hiển thị trang chủ nếu không có tìm kiếm
}
?>
