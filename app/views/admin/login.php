<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .login-container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            display: flex;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 800px;
        }
        .login-image {
            flex: 1;
            background-image: url('../../../public/images/logoLogin.png');

            background-size: cover;
            background-position: center;
        }
        .login-form {
            flex: 1;
            padding: 40px;
            background-color: #f8f9fa;
        }
        .login-form h2 {
            margin-bottom: 30px;
            text-align: center;
        }
        .login-form .form-label {
            font-weight: bold; 
        }
        .login-form .btn-login {
            background-color: yellowgreen;
            color: black;  
            width: auto; 
            padding: 10px 20px; 
            border-radius: 5px; 
            font-weight: bold;
            border: none;
        }
        .login-form .btn-login:hover {
            background-color: #e0a800; 
        }
    </style>
</head>
<body>
<div class="login-container">
    <div class="login-box">
        <div class="login-image"></div>
        <div class="login-form">
            <h2>Đăng nhập</h2>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username" class="form-label">User name:</label>
                    <input type="text" id="username" name="username" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
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
