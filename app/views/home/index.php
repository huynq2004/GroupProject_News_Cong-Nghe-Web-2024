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

// Truy vấn dữ liệu từ bảng 'news' và 'categories', bao gồm trường 'id'
$sql = "SELECT news.id, news.title, news.content, news.image, categories.name AS category_name 
        FROM news 
        INNER JOIN categories ON news.category_id = categories.id
        ORDER BY news.created_at DESC";
$result = $conn->query($sql);
?>

<?php include('../layouts/header.php'); ?> <!-- Include header -->

=======
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
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

        .news-item {
            display: flex;
            margin-bottom: 20px;
            background-color: #fff;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news-item img {
            width: 200px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
        }

        .news-content {
            flex: 1;
        }

        .news-content h3 {
            font-size: 18px;
            margin: 0;
            color: #333;
        }

        .news-content p {
            color: #555;
            font-size: 14px;
            line-height: 1.5;
        }

        .news-content a {
            color: #007BFF;
            text-decoration: none;
        }

        .news-content a:hover {
            text-decoration: underline;
        }

        .image-box img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<div class="container">
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='news-item'>";
        echo "<img src='images/" . $row["image"] . "' alt='news image'>";
        echo "<div class='news-content'>";
        echo "<h3>" . $row["title"] . "</h3>";
        echo "<p><strong>Danh mục: </strong>" . $row["category_name"] . "</p>";
        echo "<p>" . $row["content"] . "</p>";

        // Thêm ID vào URL khi nhấn "Đọc thêm"
        if (isset($row["id"])) {
            echo "<a href='detail.php?id=" . $row["id"] . "'>Đọc thêm</a>";

        } else {
            echo "ID không tồn tại!";
        }

        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Không có bài viết nào.";
}

$conn->close();
?>
</div>

<?php include('../layouts/footer.php'); ?> <!-- Include footer -->

=======
    <title>Danh sách tin tức</title>
</head>
<body>
    <h1>Danh sách tin tức</h1>
    <?php if (!empty($newsList)): ?>
        <ul>
            <?php foreach ($newsList as $news): ?>
                <li>
                    <h2>
                        <a href="index.php?controller=news&action=detail&id=<?= $news['id'] ?>">
                            <?= htmlspecialchars($news['title']) ?>
                        </a>
                    </h2>
                    <p><?= htmlspecialchars(substr($news['content'], 0, 100)) ?>...</p>
                    <p><strong>Chuyên mục:</strong> <?= htmlspecialchars($news['category_name']) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không có tin tức nào!</p>
    <?php endif; ?>
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
</body>
</html>
