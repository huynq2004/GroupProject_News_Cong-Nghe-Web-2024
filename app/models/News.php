<?php
<<<<<<< HEAD

class News {
    // Các thuộc tính (thành phần) của tin tức
    private $id;
    private $title;
    private $content;
    private $image;
    private $createdAt;
    private $categoryId;

    // Hàm khởi tạo 1 bản tin với các thuộc tính
    public function __construct($id, $title, $content, $image, $createdAt, $categoryId) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->createdAt = $createdAt;
        $this->categoryId = $categoryId;
    }

    // Getter để lớp khác truy cập thông tin
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getContent() { return $this->content; }
    public function getImage() { return $this->image; }
    public function getCreatedAt() { return $this->createdAt; }
    public function getCategoryId() { return $this->categoryId; }

    // Setter với kiểm tra giá trị hợp lệ
    public function setTitle($title) { 
        if (!empty($title)) {
            $this->title = $title;
        } else {
            throw new Exception("Title cannot be empty.");
        }
    }

    public function setContent($content) { 
        if (!empty($content)) {
            $this->content = $content;
        } else {
            throw new Exception("Content cannot be empty.");
        }
    }

    public function setImage($image) { 
        if (!empty($image)) {
            $this->image = $image;
        } else {
            throw new Exception("Image cannot be empty.");
        }
    }

    public function setCreatedAt($createdAt) { 
        // Kiểm tra định dạng ngày tháng (ví dụ: YYYY-MM-DD)
        if (strtotime($createdAt)) {
            $this->createdAt = $createdAt;
        } else {
            throw new Exception("Invalid date format.");
        }
    }

    public function setCategoryId($categoryId) { 
        if (is_numeric($categoryId)) {
            $this->categoryId = $categoryId;
        } else {
            throw new Exception("Category ID must be numeric.");
        }
    }

    // Phương thức trả về chuỗi đại diện của đối tượng
    public function __toString() {
        return "News [ID: $this->id, Title: $this->title, Category ID: $this->categoryId, Created At: $this->createdAt]";
=======
require_once 'database.php';

class News {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    // Lấy danh sách tin tức
    public function getAllNews() {
        $stmt = $this->db->prepare("
            SELECT n.id, n.title, n.content, n.image, n.created_at, c.name as category_name
            FROM news n
            JOIN categories c ON n.category_id = c.id
            ORDER BY n.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy chi tiết tin tức theo ID
    public function getNewsById($id) {
        $stmt = $this->db->prepare("
            SELECT n.id, n.title, n.content, n.image, n.created_at, c.name as category_name
            FROM news n
            JOIN categories c ON n.category_id = c.id
            WHERE n.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
>>>>>>> 2008621f6b59d55f89d75954d68782bfb4b03d33
    }
}
?>
