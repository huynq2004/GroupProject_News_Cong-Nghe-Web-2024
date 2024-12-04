Dự án này là một bài tập nhóm môn Công nghệ Web thuộc Đại học Thủy Lợi.
Các thành viên bao gồm:
- Nhóm trưởng: Nguyễn Quốc Huy.
- Thành viên: Đỗ Phương Quỳnh, Đỗ Huy Hoàn, Nguyễn Thị Thanh Thủy.

Phân công công việc:
- Nguyễn Quốc Huy: Cấu hình file điều hướng, thiết lập cấu trúc thư mục, xây dựng chức năng quản lý tin tức (xem, thêm, sửa, xóa) cho admin.
- Đỗ Phương Quỳnh: Thiết kế giao diện, tạo file layout (header, footer), xây dựng chức năng tìm kiếm tin tức cho người dùng khách.
- Đỗ Huy Hoàn: Xem danh sách tin tức (hiển thị trong `views/home/index.php`), xem chi tiết tin tức (hiển thị trong `views/news/detail.php`).
- Nguyễn Thị Thanh Thủy: thiết lập CSDL và xây dựng lớp kết nối CSDL, chức năng đăng nhập/đăng xuất (`views/admin/login.php`).

Các nhánh sẽ được tổ chức như sau:

- feature/setup-database (Thủy): Thiết lập cơ sở dữ liệu và lớp Database.
- feature/frontend-home (Hoàn): Xem danh sách tin tức và chi tiết tin tức.
- feature/frontend-search (Quỳnh): Chức năng tìm kiếm và giao diện người dùng.
- feature/admin-auth (Thủy): Đăng nhập/đăng xuất cho quản trị viên.
- feature/admin-news-management (Huy): Quản lý tin tức (thêm, sửa, xóa).