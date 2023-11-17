<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giao_dien.css">
    <link rel="stylesheet" href="../assets/css/doanh_thu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<!----------------------------------------------------------------------------------------------------------------------------------------->
        <a href="../doanh_thu/doanh_thu.php">
            <img src="../assets/img/logo.png" class="logo">
        </a>
<!---->
        <div class="tren_phai">
            <div class="thanh_dieu_huong" style="padding-left: 5%">
                <a href="../frontend/feindex.php">
                    <button class="nut1">
                        <i class="fas fa-home"></i>
                        <p>Trang chủ</p>
                    </button>
                </a>
                <button class="nut1">
                    <i class="fa-brands fa-tiktok"></i>
                    <p>TikTok</p>
                </button>
                <button class="nut1">
                    <i class="fa-brands fa-facebook"></i>
                    <p>Facebook</p>
                </button>
                <button class="nut1">
                    <i>Z</i>
                    <p>Zalo</p>
                </button>
                <button class="nut1">
                    <i class="fa-regular fa-envelope"></i>
                    <p>Email</p>
                </button>
                <audio controls autoplay>
                    <source src="../assets/img/audio.mp3" type="audio/mpeg">
                </audio>
                <button class="nut1">
                    <i class="fa-solid fa-circle-user"></i>
                    Xin chào, <?php echo $_SESSION['username']; ?>
                </button>
            </div>
        </div>
<!---->
        <div class="duoi">
<!--------->
            <div class="menu">
<!------------->
                <div class="menu-container">
                    <a href="../san_pham/san_pham.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-coffee"></i>
                            </span>
                            Sản phẩm
                        </button>
                    </a>

                    <a href="../khach_hang/khach_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-users"></i>
                            </span>
                            Khách hàng
                        </button>
                    </a>

                    <a href="../don_hang/don_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-clipboard-list"></i>
                            </span>
                            Đơn hàng
                        </button>
                    </a>

                    <a href="../nguyen_lieu/nguyen_lieu.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-seedling"></i>
                            </span>
                            Nguyên liệu
                        </button>
                    </a>

                    <a href="../nhap_hang/nhap_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fa-solid fa-warehouse"></i>
                            </span>
                            Nhập nguyên liệu
                        </button>
                    </a>

                    <a href="../xuat_hang/xuat_hang.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fa-solid fa-box"></i>
                            </span>
                            Xuất nguyên liệu
                        </button>
                    </a>

                    <a href="../nhan_vien/nhan_vien.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-user-tie"></i>
                            </span>
                            Nhân viên
                        </button>
                    </a>

                    <a href="../thuong_phat/thuong_phat.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-trophy"></i>
                            </span>
                            Thưởng / phạt
                        </button>
                    </a>

                    <a href="../quan_ly_tk/tai_khoan.php">
                        <button class="nut_menu">
                            <span class="khung_bieu_tuong">
                                <i class="fas fa-user"></i>
                            </span>
                            Quản lý các tài khoản
                        </button>
                    </a>
                </div>

                <div class="thanh_ngang"></div>
                <a href="../dang_nhap/dang_xuat.php?username=<?php echo urlencode($_SESSION['username']); ?>">
                    <button class="nut_menu">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Đăng xuất
                    </button>
                </a>
            </div>
<!--------->
            <div class="noi_dung">
<!------------->
                <div class="thong_ke">
<!----------------->