<?php
require_once APP_ROOT . '/app/controllers/NewsController.php';

// Kiểm tra xem có yêu cầu nào hay không
if (isset($_GET['action'])) {
    $controller = new NewsController(); // Khởi tạo controller

    switch ($_GET['action']) {
        case 'search':
            $controller->search(); // Gọi phương thức tìm kiếm
            break;
        case 'newsDetail':
            // Logic để hiển thị chi tiết tin tức
            break;
        case 'index':
        default:
            $controller->index(); // Mặc định gọi hàm index
            break;
    }
} else {
    // Nếu không có yêu cầu, gọi hàm index
    $controller = new NewsController();
    $controller->index();
}
