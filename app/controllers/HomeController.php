<?php
require_once APP_ROOT.'/app/services/NewsService.php';

class HomeController {
    public function index() {
        // Kiểm tra xem có id bài viết trong URL không
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            
            // Gọi dịch vụ để lấy thông tin chi tiết bài viết
            $newsService = new NewsService();
            $newsDetail = $newsService->getNewsById($id);

            // Nếu bài viết tồn tại, render view chi tiết
            if ($newsDetail) {
                include APP_ROOT.'/views/home/news/detail.php';
            } else {
                echo "Bài viết không tồn tại.";
            }
        } else {
            // Nếu không có id, hiển thị danh sách bài viết
            $newsService = new NewsService();
            $news = $newsService->getAllNews();
            
            // Render dữ liệu ra trang chủ
            include APP_ROOT.'/views/home/index.php';
        }
    }
}
