<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TRANG TIN TỨC NEWS 24H</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    .header-container {
      background-color: #F1F5D4;
      padding: 10px 20px;
      height: 170px;
      display: flex;
      align-items: center;
    }

    .logo {
      margin-left: 10px;
      display: flex;
      align-items: center;
      gap: 350px;
    }

    .logo img {
      height: 150px;
    }

    .nav-link {
      font-size: 16px;
      color: #555;
      font-weight: bold;
    }

    .nav-link:hover {
      text-decoration: underline;
      color: #333;
    }

    .search-bar {
      width: 70%;
      max-width: 200px;
    }

    .navbar {
      width: 100%;
      background-color: #F5EB83;
      border-bottom: 1px solid #ddd;
    }

    .navbar .navbar-brand {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <header class="header-container">
    <div class="container d-flex justify-content-between align-items-center">
      <!-- Logo -->
      <div class="logo d-flex align-items-center">
        <div>
          <img src="https://cdn.pixabay.com/photo/2016/09/04/17/46/news-1644696_1280.png" alt="NEWS Logo">
        </div>

        <div class="ms-3">
          <img src="<?= DOMAIN . 'public/images/logo2.webp' ?>" alt="Thế Giới 24 Logo" height="60">
        </div>
      </div>
      <?php if (isset($_SESSION['username'])): ?>
        <a href="?controller=Admin&action=logout" class="nav-link mx-2" style="color:gray">ĐĂNG XUẤT
        </a>
      <?php else: ?>
        <a href="?controller=Admin&action=showLogin" class="nav-link mx-2" style="color:gray">ĐĂNG NHẬP</a>
      <?php endif; ?>
    </div>
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="w-100 px-4">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-around w-100">
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="?controller=Home&action=index">TRANG CHỦ</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                THỂ LOẠI
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Đời sống</a></li>
                <li><a class="dropdown-item" href="#">Giáo dục</a></li>
                <li><a class="dropdown-item" href="#">Chính trị</a></li>
                <li><a class="dropdown-item" href="#">Kinh tế</a></li>
              </ul>
            </li>
            <form class="d-flex" role="search" action="?controller=News&action=search" method="POST" style="width: 350px">
              <input class="form-control me-2" type="search" name="text" placeholder="Tìm kiếm" aria-label="Search" style="font-size: 20px; padding: 5px;" required>
              <button class="btn btn-outline-secondary" type="submit" style="font-size: 15px; padding: 5px 10px 5px 8px; width:150px">TÌM KIẾM</button>
            </form>
            <li class="nav-item">
              <a class="nav-link active" aria-disabled="false" href="#">LIÊN HỆ</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
