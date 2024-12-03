<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Chỉnh sửa tin tức</h2>
    <form action="<?= DOMAIN . '/news/update' ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $news->getId(); ?>">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" id="title" value="<?= $news->getTitle(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" id="content" rows="5" required><?= $news->getContent(); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image">
            <img src="<?= DOMAIN . 'public/images/' . $news->getImage(); ?>" alt="Current Image" style="width: 150px; height: 100px;">
        </div>
        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="?controller=News&action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>