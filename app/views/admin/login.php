<?php
require_once APP_ROOT . '/app/config/config.php';
?>
<?php if (isset($_GET['error'])): ?>
    <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= DOMAIN . 'public/css/bootstrap.min.css'; ?>">
    <style>
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
        }

        .login-box {
            display: flex;
            flex-direction: row;
            box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            width: 750px;
            background-color: white;
        }

        .login-image {
            flex: 1;
            background-image: url('<?= DOMAIN; ?>public/images/Login_Logo.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-form {
            flex: 1;
            padding: 40px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .login-form .form-label {
            font-weight: bold;
            color: #555;
        }

        .login-form .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
        }

        .btn-login {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        .error-message {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
            background-color: #f8d7da;
            /* Màu nền nhạt */
            border: 1px solid #f5c6cb;
            /* Đường viền màu đỏ */
            border-radius: 5px;
            /* Bo tròn các góc */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-image"></div>
            <div class="login-form">
                <h2>Đăng nhập quản trị</h2>

                <!-- Thêm phần hiển thị lỗi nếu có -->
                <form action="?controller=Admin&action=login" method="POST">
                    <div class="form-group">
                        <label for="username" class="form-label">Tên đăng nhập:</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Mật khẩu:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn-login">Đăng nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
