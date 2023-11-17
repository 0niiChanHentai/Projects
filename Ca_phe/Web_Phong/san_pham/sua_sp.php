<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

// Check for 'quyen1' permission
$query = "SELECT phanquyen FROM tai_khoan WHERE ten_tk = '{$_SESSION['username']}'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $phanquyen = $row['phanquyen'];

    if ($phanquyen !== '1') {
        header("Location: ../reject.php");
            exit();
    }
}
?>

<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $masp = $_POST['masp'];
       $tensp = $_POST['tensp'];
       $giathanh = $_POST['giathanhsp'];
       $thanhphan = $_POST['thanhphansp'];
       $hinhanh = $_POST['hinhanh'];
       $mota = $_POST['mota'];
       $phanloai = $_POST['phanloai'];
       $ghichu = $_POST['ghichusp'];
 
       $sql = "UPDATE san_pham SET tensp='$tensp', giathanh='$giathanh', thanhphan='$thanhphan', hinhanh='$hinhanh', mota='$mota', phanloai='$phanloai', ghichu='$ghichu' WHERE masp='$masp'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: san_pham.php');
    } 

}
catch(Exception){
    header('location: san_pham.php');
}

?>

<?php

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/giao_dien.css">
    <link rel="stylesheet" href="../assets/css/san_pham.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <a href="../doanh_thu/doanh_thu.php">
        <img src="../assets/img/logo.png" class="logo">
    </a>

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

    <div class="duoi">

    <div class="menu">
            <!-------->
            <div class="menu-container">
                <a href="../san_pham/san_pham.php">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-coffee"></i>
                        </span>
                        Sản phẩm
                    </button>
                </a>

                <!-- <a href="../doanh_thu/doanh_thu.php">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-chart-bar"></i>
                        </span>
                        Thống kê doanh thu
                    </button>
                </a> -->

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-hand-holding-usd"></i>
                        </span>
                        Tài chính
                    </button>
                </a> -->

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

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-tools"></i>
                        </span>
                        Vật tư
                    </button>
                </a> -->

                <!-- <a href="your_link_here">
                    <button class="nut_menu">
                        <span class="khung_bieu_tuong">
                            <i class="fas fa-business-time"></i>
                        </span>
                        Ca làm
                    </button>
                </a> -->

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

            <!-------->
        </div>

        <div class="noi_dung">

            <!-- <video controls autoplay width=80% height=100%>
                <source src="video.mp4" type="video/mp4">
            </video> -->
            
<!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="thong_ke">

                <div class="khung_tren">
                    <label class="title">SỬA THÔNG TIN SẢN PHẨM</label>
                </div>

                <!-- <div class="khung_giua">

                </div> -->

                <div class="khung_duoi" style="margin-top: -2%;">

                    <div id="content" style="margin-left: 5%;">
                        <form method="post" style="display:flex; flex-direction:column;">
                            <label>ID sản phẩm cần sửa thông tin:</label>
                            <?php
                            if (isset($_POST['buttonValue'])) {
                                $buttonValue = $_POST['buttonValue'];
                                echo '<input type="text" name="masp" value="' . $buttonValue . '" readonly>';
                            } else {
                                echo '<input type="text" name="masp" value="" readonly>';
                            }
                            ?></br>
                        
                            <label>Tên sản phẩm:</label>
                            <input type="text" name="tensp" required><br>
                        
                            <label>Giá:</label>
                            <input type="text" name="giathanhsp" required><br>
                        
                            <label>Thành phần:</label>
                            <input type="text" name="thanhphansp" required><br>

                            <label>Hình ảnh:</label>
                            <input type="text" name="hinhanh" required><br>

                            <label>Mô tả:</label>
                            <input type="text" name="mota" required><br>

                            <label>Phân loại:</label>
                            <input type="text" name="phanloai" required><br>

                            <label>Ghi chú:</label>
                            <input type="text" name="ghichusp" value = "(không)" required><br>

                            <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px"
                                onclick="validateForm()">
                        </form>
                    </div>
                </div>
            </div>

            </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
            <div class="ho_tro" style="margin-left: 70%; margin-top: 12.5%">
                <div class="lich" style="width: 100%">
                    <iframe src="https://calendar.google.com/calendar/embed?src=trancongminh14042001%40gmail.com&ctz=Asia%2FHo_Chi_Minh"
                        style="border: 0" width="100%" height="50%" frameborder="0" scrolling="no"></iframe>
                    <div class="note">

                    </div>
                    <div class="sdt_dia_chi">
                        <p>Số điện thoại: 0354220664</p>
                        <p>Địa chỉ: Số 6, Lô 5, Khu C2, Hải An, Hải Phòng</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    
    <script src="../assets/js/san_pham.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script>
        function validateForm() {
            var idxuat_hang = document.getElementsByName('idxuat_hang')[0];

            if (idxuat_hang.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin sản phẩm cần sửa");
                return false; // Prevent form submission
            }
        }
    </script>

</body>

</html>