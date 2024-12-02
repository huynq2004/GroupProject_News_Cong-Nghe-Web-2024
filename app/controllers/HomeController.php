<?php
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
