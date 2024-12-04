<?php include APP_ROOT . '/app/views/layouts/header.php'; ?>
    <div class="container mt-4">
        <table class="table">
            <tbody>
                <?php
                foreach ($newsList as $news) {
                ?>
                    <tr>
                        <td scope="row" style="width: 166px">
                            <img src="<?= DOMAIN.'public/images/'.$news->getImage()?>" class="img-thumbnail" alt="Ảnh thumbnail tin tức" style="width: 150px; height: 100px;">
                        </td>
                        <td>
                            <h5><?= $news->getTitle() ?></h5>
                            <p><?= $news->getContent() ?></p>
                        </td>
                        <td style="vertical-align: middle;">
                            <a href="?controller=Home&action=detail&id=<?= $news->getId();  ?>" title="Đọc Thêm">Đọc Thêm</a>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
