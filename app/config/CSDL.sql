-- Tạo cơ sở dữ liệu
CREATE DATABASE news_website CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE news_website;

-- Tạo bảng 'users'
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL DEFAULT 0 -- 0: người dùng, 1: quản trị viên
);

-- Tạo bảng 'categories'
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Tạo bảng 'news'
CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);
-- Them admin

INSERT INTO users (username, password, role)
VALUES ('admin','123123', 1),
('guest','guest123', 0); 

-- Thêm dữ liệu mẫu vào bảng 'categories'
INSERT INTO categories (name) VALUES
('Thời sự'), 
('Thể thao'), 
('Giải trí'), 
('Kinh tế');

-- Thêm dữ liệu mẫu vào bảng 'news'
INSERT INTO news (title, content, image, category_id) VALUES
('Tin Thời sự 1', 'Nội dung bài viết thời sự 1', 'thoi_su_1.jpg', 1),
('Tin Thể thao 1', 'Nội dung bài viết thể thao 1', 'the_thao_1.jpg', 2),
('Tin Giải trí 1', 'Nội dung bài viết giải trí 1', 'giai_tri_1.jpg', 3),
('Tin Kinh tế 1', 'Nội dung bài viết kinh tế 1', 'kinh_te_1.jpg', 4);