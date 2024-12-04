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
                    header("Location: " . DOMAIN . "public/index.php?controller=Home&action=index");
                    exit();
                }
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                header("Location: " . DOMAIN . "public/index.php?controller=Admin&action=showLogin&error=" . urlencode($error));
                exit();
            }
        }
    }

    public function showLogin()
    {
        include APP_ROOT . '/app/views/admin/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: ?controller=Home&action=index");
        exit();
    }
}
