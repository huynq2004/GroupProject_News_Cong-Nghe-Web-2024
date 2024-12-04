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

    public function add() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $image = $_FILES['image'] ?? null;

        $imageName = null;
        if ($image && $image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = APP_ROOT . '/public/images/';
            $imageName = basename($image['name']);
            $uploadFile = $uploadDir . $imageName;

            if (!move_uploaded_file($image['tmp_name'], $uploadFile)) {
                echo "Không thể upload hình ảnh!";
                exit();
            }
        }

        // Gọi service để thêm bản tin
        $newsService = new NewsService();
        $newsService->addNews($title, $content, $imageName);

        // Chuyển hướng về danh sách
        header('Location: ?controller=News&action=index');
        exit();
    }

    // Hiển thị form nếu không phải POST
    include APP_ROOT . '/app/views/admin/news/add.php';
}
    
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
                header("Location: " . DOMAIN . "public/index.php?controller=News&action=index");
                exit();
            } else {
                echo "Cập nhật không thành công.";
                exit();
            }
        }
    }

    public function delete() {
        $id = $_POST['id'] ?? null;

    if ($id) {
        $newsService = new NewsService();
        $newsService->delete($id);

        // Chuyển hướng về dashboard sau khi xóa
        header('Location: ?controller=News&action=index');
        exit();
    } else {
        echo "ID không hợp lệ!";
    }

    }
    

}