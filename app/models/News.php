<?php
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
    }
}
?>
