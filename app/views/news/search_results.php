<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($_POST['text']) ?>"</h2>

        <?php if (!empty($newsList)): ?>

            <ul class="list-group">
                <?php foreach ($newsList as $news): ?>
                    <li class="list-group-item">
                        <h5><a href="/news/detail/<?= $news->getId() ?>"><?= htmlspecialchars($news->getTitle()) ?></a></h5>
                        <p><?= htmlspecialchars(substr($news->getContent(), 0, 150)) ?>...</p>
                        <small>Ngày đăng: <?= $news->getCreatedAt() ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Không tìm thấy kết quả nào.</p>
        <?php endif; ?>

        <a href="/" class="btn btn-primary mt-4">Quay lại trang chủ</a>
    </div>
</body>
</html>
