<?php
    include APP_ROOT . '/app/views/layouts/header.php';
?>

<div class="blog-post" style="margin-left: 50px">
    <h2 class="blog-post-title"><?= htmlspecialchars($news->getTitle()) ?></h2>
    <p class="blog-post-meta"><?= date('F d, Y', strtotime($news->getCreatedAt())) ?> by Author</p>

    <img src="<?= DOMAIN.'public/images/'.$news->getImage() ?>" alt="Ảnh tin tức" class="img-fluid" style=
        "width:500px;
        height: 350px;
        margin-left: 30%">

    <div class="content mt-4">
        <p><?= nl2br(htmlspecialchars($news->getContent())) ?></p>
    </div>

    <hr>
</div>

<?php include APP_ROOT . '/app/views/layouts/footer.php'; ?>
