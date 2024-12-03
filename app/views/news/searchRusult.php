<h2>Kết quả tìm kiếm cho: <?php echo htmlspecialchars($query); ?></h2>
<?php if (empty($results)): ?>
    <p>Không tìm thấy tin tức nào.</p>
<?php else: ?>
    <ul>
        <?php foreach ($results as $newsItem): ?>
            <li>
                <a href="index.php?action=newsDetail&id=<?php echo $newsItem->getId(); ?>">
                    <?php echo htmlspecialchars($newsItem->getTitle()); ?>
                </a>
                <p><?php echo htmlspecialchars(substr($newsItem->getContent(), 0, 100)) . '...'; ?></p>
                <small>Ngày: <?php echo htmlspecialchars($newsItem->getCreatedAt()); ?></small>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>