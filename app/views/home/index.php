<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
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
</body>
</html>
