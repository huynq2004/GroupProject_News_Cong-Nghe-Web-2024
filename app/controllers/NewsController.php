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
        
}