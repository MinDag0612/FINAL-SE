# Final_SE - Staff Account Management

## Mô tả

Ứng dụng web đơn giản quản lý tài khoản nhân viên. Ứng dụng cho phép người dùng:
- Đăng ký tài khoản
- Đăng nhập
- Kiểm tra mật khẩu (được mã hóa bằng `bcrypt`)
- Tương tác với cơ sở dữ liệu MySQL

Ứng dụng sử dụng **PHP**, **Twig** và **MySQL** cho backend, và được triển khai bằng **Docker**.

## Cấu trúc thư mục

final_se/
│
├── docker-compose.yml
├── Dockerfile
├── docker/
│ └── mysql-init/ # Script khởi tạo DB
│
├── src/ # Mã nguồn chính
│ ├── connect.php # Kết nối CSDL
│ ├── login.php # Trang đăng nhập
│ ├── signup.php # Trang đăng ký
│ ├── home.php # Trang chủ (sau khi đăng nhập)
│ ├── style/ # CSS
│ │ └── login.css
│ └── templates/ # Giao diện Twig
│ ├── login.html.twig
│ └── signup.html.twig
└── README.md # File README


## Cài đặt và chạy ứng dụng

### 1. Cài đặt Docker và Docker Compose

Nếu chưa cài Docker, bạn có thể tải về và cài đặt tại [Docker](https://www.docker.com/get-started).

### 2. Clone repository

```bash
git clone hhttps://github.com/MinDag0612/FINAL-SE.git
cd final_se
docker-compose up --build
