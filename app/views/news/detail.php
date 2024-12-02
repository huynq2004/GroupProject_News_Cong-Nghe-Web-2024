<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
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
</body>
</html>
