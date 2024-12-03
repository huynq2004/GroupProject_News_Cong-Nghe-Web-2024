<?php 
require_once APP_ROOT.'/app/services/NewsService.php';
class NewsController {
    public function index() {
        //Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();

        //Render dữ liệu lấy ra vào dashboard
        include APP_ROOT.'/app/views/admin/dashboard.php';
    }

    //Thêm phương thức search để xử lý tìm kiếm
    // public function search() {
    //     $query = $_GET['query'];
        
    //     // Gọi dịch vụ để tìm kiếm tin tức
    //     $newsService = new NewsService();
    //     $results = $newsService->searchNews($query);
        
    //     // Chuyển kết quả tới view
    //     include APP_ROOT.'/app/views/news/search_results.php';
    // }
    
    public function edit() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if ($id) {
            $newsService = new NewsService();
            $news = $newsService->getNewsById($id);
    
            if ($news) {
                // Chuyển đến view edit.php cùng với dữ liệu bài viết
                include APP_ROOT . '/app/views/admin/news/edit.php';
            } else {
                echo "Bài viết không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }
    
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_FILES['image'];
    
            $newsService = new NewsService();
    
            // Kiểm tra và upload hình ảnh mới nếu có
            if (!empty($image['name'])) {
                $imageName = time() . '_' . $image['name'];
                move_uploaded_file($image['tmp_name'], APP_ROOT . '/public/images/' . $imageName);
            } else {
                $news = $newsService->getNewsById($id);
                $imageName = $news->getImage();
            }
    
            $success = $newsService->updateNews($id, $title, $content, $imageName);
    
            if ($success) {
                header("Location: " . DOMAIN . "/dashboard");
                exit();
            } else {
                echo "Cập nhật không thành công.";
                exit();
            }
        }
    }
    

}