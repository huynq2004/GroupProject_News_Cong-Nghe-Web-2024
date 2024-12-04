<?php 
require_once APP_ROOT . '../app/config/config.php';
include APP_ROOT . '/app/views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Thêm tin tức mới</h2>
    <form action="?controller=News&action=add" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Nhập tiêu đề" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" id="content" rows="5" placeholder="Nhập nội dung" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Danh mục</label>
            <select name="category_id" class="form-select" id="category" required>
                <option value="">-- Chọn danh mục --</option>
                <option value="1">Thời sự</option>
                <option value="2">Thể thao</option>
                <option value="3">Giải trí</option>
                <option value="4">Kinh tế</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="?controller=News&action=index" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
