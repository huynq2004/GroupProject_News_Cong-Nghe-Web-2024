<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>
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

        <a href="<?= DOMAIN ?>public/index.php?controller=News&action=index" class="btn btn-primary mt-4">Quay lại</a>
    </div>
<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
