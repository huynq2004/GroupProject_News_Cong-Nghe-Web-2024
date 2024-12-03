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

    //Thêm phương thức searchNews để tìm kiếm tin tức theo tiêu đề hoặc nội dung
    public function searchNews($query) {
        $results = [];
        try {
            // Kết nối đến CSDL
            $conn = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '');
    
            // Truy vấn tìm kiếm
            $sql = "SELECT * FROM news WHERE title LIKE :query OR content LIKE :query";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $query . "%";
            $stmt->bindParam(':query', $searchTerm);
            $stmt->execute();
    
            // Xử lý kết quả trả về
            while ($row = $stmt->fetch()) {
                $results[] = new News($row['id'], $row['title'], $row['content'], $row['image'], $row['created_at'], $row['category_id']);
            }
            return $results;
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $results;
        }
    }

}
    
        
