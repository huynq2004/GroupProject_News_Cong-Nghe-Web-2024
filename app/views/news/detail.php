<<<<<<< HEAD
<?php
// Kết nối cơ sở dữ liệu
$host = "localhost";
$user = "root";
$pass = "";
$db = "news_website";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra sự tồn tại của 'id' trong URL và bảo mật bằng cách lọc id
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Sử dụng Prepared Statement để bảo vệ khỏi SQL Injection
    $sql = "SELECT news.title, news.content, news.image, categories.name AS category_name 
            FROM news 
            INNER JOIN categories ON news.category_id = categories.id
            WHERE news.id = ?";
    
    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Gắn giá trị id vào câu truy vấn
    $stmt->execute();
    $result = $stmt->get_result();

    // Kiểm tra nếu có bài viết
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
        $category_name = $row['category_name'];
    } else {
        echo "Bài viết không tồn tại.";
        exit;
    }
} else {
    echo "Không có ID bài viết hoặc ID không hợp lệ.";
    exit;
}

$conn->close();
?>

=======
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> - Chi tiết bài viết</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .news-detail {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news-detail img {
            width: 100%;
            height: auto;
        }

        .news-detail h2 {
            color: #333;
        }

        .news-detail p {
            color: #555;
            line-height: 1.6;
        }

        .back-link {
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="news-detail">
        <h2><?php echo htmlspecialchars($title); ?></h2>
        <p><strong>Danh mục:</strong> <?php echo htmlspecialchars($category_name); ?></p>
        <div class="image-box">
            <img src="images/<?php echo htmlspecialchars($image); ?>" alt="News Image">
        </div>
        <p><?php echo nl2br(htmlspecialchars($content)); ?></p>

        <!-- Thêm link quay lại trang trước hoặc trang chủ -->
        <a href="index.php" class="back-link">Quay lại trang chủ</a>
    </div>
</div>

=======
    <title>Chi tiết tin tức</title>
</head>
<body>
    <h1><?= htmlspecialchars($newsItem['title']) ?></h1>
    <p><strong>Chuyên mục:</strong> <?= htmlspecialchars($newsItem['category_name']) ?></p>
    <p><?= htmlspecialchars($newsItem['content']) ?></p>
    <?php if (!empty($newsItem['image'])): ?>
        <img src="uploads/<?= htmlspecialchars($newsItem['image']) ?>" alt="<?= htmlspecialchars($newsItem['title']) ?>">
    <?php endif; ?>
    <p>Ngày đăng: <?= htmlspecialchars($newsItem['created_at']) ?></p>
    <a href="index.php">Quay lại danh sách</a>
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
</body>
</html>
