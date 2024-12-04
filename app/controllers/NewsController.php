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

    public function searchAction() {
        // Kiểm tra xem có từ khóa tìm kiếm không
        $keyword = isset($_GET['q']) ? $_GET['q'] : '';

        if (!empty($keyword)) {
            // Tạo kết nối đến cơ sở dữ liệu
            $db = new DBConnection();
            $conn = $db->getConnection();

            // Truy vấn tìm kiếm trong bảng 'news' với từ khóa
            $sql = "SELECT * FROM news WHERE title LIKE :keyword OR content LIKE :keyword";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':keyword', '%' . $keyword . '%');
            $stmt->execute();

            // Lấy danh sách tin tức tìm thấy
            $newsList = $stmt->fetchAll(PDO::FETCH_OBJ);

            // Gọi view để hiển thị kết quả
            require_once APP_ROOT . '/app/views/search_results.php';
        } else {
            echo 'Vui lòng nhập từ khóa tìm kiếm.';
        }
    }
}
