<?php
require_once APP_ROOT.'/app/services/NewsService.php';

class HomeController {
    public function index() {
        //Gọi dữ liệu từ NewsService
        $newsService = new NewsService();
        $newsList = $newsService->getAllNews();

        //Render dữ liệu lấy ra vào dashboard
        include APP_ROOT.'/app/views/home/index.php';
    }

    public function detail() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if ($id) {
            $newsService = new NewsService();
            $news = $newsService->getNewsById($id);

            if ($news) {
                // Chuyển đến view edit.php cùng với dữ liệu bài viết
                include APP_ROOT . '/app/views/news/detail.php';
            } else {
                echo "Bài viết không tồn tại.";
            }
        } else {
            echo "ID không hợp lệ.";
        }
    }
}
?>
