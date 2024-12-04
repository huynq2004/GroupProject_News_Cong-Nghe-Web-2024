<?php

class News {
    //Các thuộc tính (thành phần) của tin tức
    private $id;
    private $title;
    private $content;
    private $image;
    private $created_at;
    private $category_id;

    //constructer 1 bản tin với các thuộc tính
    public function __construct($id, $title, $content, $image, $created_at, $category_id) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->category_id = $category_id;
    }

    //Getter để lớp khác truy cập thông tin (do các thuộc tính bản tin có pvi truy xuất là private = không thể truy cập từ ngoài)
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getContent() { return $this->content; }
    public function getImage() { return $this->image; }
    public function getCreatedAt() { return $this->created_at; }
    public function getCategoryId() { return $this->category_id; }

    //Setter
    public function setTitle($title) {  $this->title = $title; }
    public function setContent($content) { $this->content = $content; }
    public function setImage($image) { $this->image = $image; }
    public function setCreated_at($created_at) { $this->created_at = $created_at; }
    public function setCategoryId($category_id) { $this->category_id = $category_id; }
}
