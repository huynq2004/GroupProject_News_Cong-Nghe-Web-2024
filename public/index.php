<?php
<<<<<<< HEAD
require_once('../app/config/config.php');
// //Dùng để test controller
 require_once APP_ROOT.'/app/controllers/NewsController.php';

 $controller = new NewsController();
 $controller->index();
=======
// Nạp cấu hình
require_once('../app/config/config.php');

// Hàm tự động nạp các file cần thiết
spl_autoload_register(function ($className) {
    $path = APP_ROOT . "/app/controllers/$className.php";
    if (file_exists($path)) {
        require_once $path;
    }
});

// Lấy tham số controller và action từ URL
$controller = $_GET['controller'] ?? 'home'; // Mặc định là home
$action = $_GET['action'] ?? 'index';        // Mặc định là index

try {
    // Xác định tên controller
    $controllerClass = ucfirst($controller) . 'Controller';

    // Kiểm tra nếu file và class tồn tại
    if (!file_exists(APP_ROOT . "/app/controllers/$controllerClass.php")) {
        throw new Exception("Controller $controllerClass không tồn tại!");
    }

    // Tạo đối tượng controller
    $controllerInstance = new $controllerClass();

    // Kiểm tra nếu action tồn tại trong controller
    if (!method_exists($controllerInstance, $action)) {
        throw new Exception("Action $action không tồn tại trong $controllerClass!");
    }

    // Gọi phương thức action
    $controllerInstance->$action();
} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage();
}
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
