<?php
require_once APP_ROOT .'/app/models/News.php';

class NewsService{
    public function getAllNews(){
        $newsList = [];
        try{
            //Kết nối đến CSDL
            $conn = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '' );

            //Truy vấn
            $sql = "SELECT * FROM news ORDER BY created_at DESC";
            $stmt = $conn->query($sql);

            //Xử lý kết quả trả về
            while($row = $stmt->fetch()){
                $newsList[] = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
            }
            return $newsList;

        } catch( PDOException $e ) {
            echo $e->getMessage();
            return $newsList;
        }
    }

    public function editNews($news){
    }

    public function addNews($news){}
<<<<<<< HEAD
      // Lấy tất cả bài viết
      public function getAllNews() {
        $newsModel = new News();
        return $newsModel->getAll();
    }

    // Lấy chi tiết bài viết theo ID
    public function getNewsById($id) {
        $newsModel = new News();
        return $newsModel->getById($id);
    }
=======
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
}
    
        
