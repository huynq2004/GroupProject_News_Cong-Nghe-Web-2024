<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>
<div class="container mt-4">
    <h2>Kết quả tìm kiếm cho: "<?= htmlspecialchars($_POST['text']) ?>"</h2>

    <?php if (!empty($newsList)): ?>
        <ul class="list-group">
            <?php foreach ($newsList as $news): ?>
                <li class="list-group-item">
                    <div class="row">
                        <!-- Cột chứa hình ảnh -->
                        <div class="col-md-3">
                            <img src="<?= DOMAIN.'public/images/'.$news->getImage()?>" class="img-thumbnail" alt="Ảnh thumbnail tin tức" style="width: 280px; height: 200px;">
                        </div>
                        <!-- Cột chứa thông tin tin tức -->
                        <div class="col-md-9">
                            <h5>
                                <a href="?controller=Home&action=detail&id=<?= $news->getId();  ?>">
                                    <?= htmlspecialchars($news->getTitle()) ?>
                                </a>
                            </h5>
                            <p><?= htmlspecialchars(substr($news->getContent(), 0, 150)) ?>...</p>
                            <small>Ngày đăng: <?= $news->getCreatedAt() ?></small>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Không tìm thấy kết quả nào.</p>
    <?php endif; ?>
    <a href="?controller=Home&action=index" class="btn btn-primary mt-4">Quay lại</a>
</div>
<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
