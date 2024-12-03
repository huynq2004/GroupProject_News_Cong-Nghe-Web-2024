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
    public function search() {
        $query = $_GET['query'];
        
        // Gọi dịch vụ để tìm kiếm tin tức
        $newsService = new NewsService();
        $results = $newsService->searchNews($query);
        
        // Chuyển kết quả tới view
        include APP_ROOT.'/app/views/news/search_results.php';
    }
        
}