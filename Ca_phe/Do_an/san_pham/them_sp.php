<?php
include('../db_ket_noi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../dang_nhap/dang_nhap.php");
    exit();
}

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

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM san_pham ORDER BY tensp ASC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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


        $sql = "INSERT INTO san_pham (tensp, giathanh, thanhphan, hinhanh, mota, phanloai, ghichu) VALUES ('$tensp', '$giathanh', '$thanhphan', '$hinhanh', '$mota', '$phanloai', '$ghichu')";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: san_pham.php');
    }
} catch (Exception) {
    echo '<script>alert("Xảy ra lỗi!");</script>';
    echo "<script>window.location = 'san_pham.php';</script>";
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!--------------------------------------------------------Chèn thêm CSS bên dưới----------------------------------------------------------->

<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/giua.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                <!--
                    <div class="khung_tren">
                       
                    </div>
                -->
<!----------------->
                    <div class="khung_giua">
                        <label class="title">THÊM MỚI SẢN PHẨM</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label class="chu">Tên sản phẩm:</label>
                                <input type="text" name="tensp" required><br>

                                <label class="chu">Giá:</label>
                                <input type="text" name="giathanhsp" required><br>

                                <label class="chu">Thành phần:</label>
                                <input type="text" name="thanhphansp" required><br>

                                <label class="chu">Ghi chú:</label>
                                <input type="text" name="ghichusp" value="(không)" required><br>

                                <label class="chu">Hình ảnh:</label>
                                <input type="text" name="hinhanh" required><br>

                                <label class="chu">Mô tả:</label>
                                <input type="text" name="mota" required><br>

                                <label class="chu">Phân loại:</label>
                                <input type="text" name="phanloai" required><br>
                                <input type="submit" value="Thêm" name="submit" id="themmoi" style="width: 120px; height: 40px">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>