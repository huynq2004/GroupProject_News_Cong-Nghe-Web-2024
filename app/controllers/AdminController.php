<?php
require_once APP_ROOT . '/app/services/UserService.php';

class AdminController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userService = new UserService();
            $user = $userService->authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['role'] = $user->getRole();

                // Kiểm tra nếu là admin
                if ($userService->isAdmin($user->getUsername())) {
                    header("Location: " . DOMAIN . "public/index.php?controller=News&action=index");
                    exit();
                } else {
                    $error = "Bạn không có quyền truy cập trang admin!";
                    session_destroy(); // Xóa session nếu không phải admin
                }
            } else {
                // Nếu tài khoản không tồn tại hoặc mật khẩu sai
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                // Điều hướng về trang đăng nhập và truyền thông báo lỗi qua URL
                header("Location: " . DOMAIN . "public/index.php?controller=Admin&action=showLogin&error=" . urlencode($error));
                exit();
            }
        }
    }

    public function showLogin()
    {
        include APP_ROOT . '/app/views/admin/login.php';
    }
}
