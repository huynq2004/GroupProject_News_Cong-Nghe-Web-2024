<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tin tức</title>
    <link rel="stylesheet" href="<?= DOMAIN . 'public/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?= DOMAIN . 'public/css/bootstrap-icons.min.css'; ?>">
</head>

<body>
    <div class="container mt-4">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        <a href="<?= DOMAIN . '/app/views/admin/news/add.php'; ?>" class="btn btn-success">Thêm bản tin</a>
                    </th>
                    <th scope="col"></th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
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
                            <a href="<?= DOMAIN.'app/views/admin/news/edit.php?id='.$news->getId()?>"><i class="bi-pencil-square" style="font-size: 30px;"></i></a>
                        </td>
                        <td style="vertical-align: middle;">
                            <form action="<?= DOMAIN.'app/views/admin/news/delete.php' ?>" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tin này?')">
                                <input type="hidden" name="id" value="<?= $news->getId() ?>">
                                <button type="submit" class="btn btn-link p-0 m-0 text-danger" style="border: none; background: none;">
                                    <i class="bi bi-trash" style="font-size: 30px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>