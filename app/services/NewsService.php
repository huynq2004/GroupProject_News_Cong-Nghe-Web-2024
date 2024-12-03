<?php
require_once APP_ROOT .'/app/models/News.php';

class NewsService{
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

    public function editNews($news){
    }

    public function addNews($news){}
}
    
        
