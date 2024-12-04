<?php
require_once APP_ROOT . '/app/models/News.php';
require_once APP_ROOT . '/app/config/database.php';

class NewsService
{
    public function getAllNews()
    {
        $newsList = [];
        //Kết nối đến CSDL
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            //Truy vấn
            $sql = "SELECT * FROM news ORDER BY created_at DESC";
            $stmt = $conn->query($sql);

            //Xử lý kết quả trả về
            while ($row = $stmt->fetch()) {
                $newsList[] = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
            }
            return $newsList;
        }
    }

    public function getNewsById($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "SELECT * FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $row = $stmt->fetch();

            // Kiểm tra xem có dữ liệu không trước khi tạo đối tượng
            if ($row) {
                return new News(
                    $row['id'],
                    $row['title'],
                    $row['content'],
                    $row['image'],
                    $row['created_at'],
                    $row['category_id']
                );
            } else {
                // Xử lý trường hợp không tìm thấy bài viết
                return null;
            }
        } else {
            echo 'Không kết nối được tới cơ sở dữ liệu';
            return null;
        }
    }

    public function updateNews($id, $title, $content, $image)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "UPDATE news SET title = :title, content = :content, image = :image WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $image);

            return $stmt->execute();
        } else {
            return false;
        }
    }


    public function addNews($title, $content, $imageName)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "INSERT INTO news (title, content, image) VALUES (:title, :content, :image)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':image', $imageName);
            $stmt->execute();
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
        }
    }

    public function delete($id)
    {
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if ($conn != null) {
            $sql = "DELETE FROM news WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } else {
            echo 'Không thể kết nối cơ sở dữ liệu!';
        }
    }
}
