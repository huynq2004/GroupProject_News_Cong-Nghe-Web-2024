<?php
<<<<<<< HEAD
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
=======
require_once 'models/News.php';

class HomeController {
    private $newsModel;

    public function __construct() {
        $this->newsModel = new News();
    }

    public function index() {
        // Lấy danh sách tin tức
        $newsList = $this->newsModel->getAllNews();
        // Gọi view danh sách tin tức
        require 'views/home/index.php';
    }
    public function detail($id) {
        // Lấy chi tiết tin tức theo ID
        $newsItem = $this->newsModel->getNewsById($id);
        if (!$newsItem) {
            die("Tin tức không tồn tại.");
        }
        // Gọi view chi tiết tin tức
        require 'views/news/detail.php';
    }
}
?>
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
