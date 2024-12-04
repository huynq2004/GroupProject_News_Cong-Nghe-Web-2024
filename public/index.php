<?php
require_once '../app/config/config.php';
require '../app/config/database.php';

// Lấy thông tin về controller và action từ URL
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Home';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Tạo đường dẫn đến file controller dựa trên thông tin từ URL
$controllerPath = "../app/controllers/{$controller}Controller.php";

// Kiểm tra và include controller
if (file_exists($controllerPath)) {
    require $controllerPath;
    $controllerClass = $controller . 'Controller';
    $controllerObject = new $controllerClass();

    // Gọi action
    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        // Action không tồn tại
        echo "404 Not Found: The action does not exist.";
    }
} else {
    // Controller không tồn tại
    echo "404 Not Found: The controller does not exist.";
}
