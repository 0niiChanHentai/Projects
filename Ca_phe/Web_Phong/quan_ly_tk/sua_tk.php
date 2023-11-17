<?php
include '../ket_noi.php';

if ($conn) {
} else {
    echo ("Ket noi database that bai");
}

try {
    if (empty($_POST['submit'])) {
        $sql = "SELECT * FROM nhap_hang ORDER BY thoigiannhap DESC";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = $row;
        }
    }
    if (!empty($_POST['submit'])) {
        $id_tk = $_POST['id_tk'];
        $ten_tk = $_POST['ten_tk'];
        $pass = $_POST['pass'];
        $phanquyen = $_POST['phanquyen'];
        $id_nhanvien = $_POST['id_nhanvien'];
        $ghichu = $_POST['ghichu'];

        $sql = "UPDATE tai_khoan SET ten_tk='$ten_tk',  pass='$pass', phanquyen='$phanquyen', id_nhanvien='$id_nhanvien', ghichu='$ghichu' WHERE id_tk='$id_tk'";
        $stmt = $conn->prepare($sql);
        $query = $stmt->execute();
        header('location: tai_khoan.php');
    }
} catch (Exception) {
    header('location: tai_khoan.php');
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/tren.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!----------------->
                    <div class="khung_tren">
                        <label class="title" style="text-align: center;">SỬA THÔNG TIN TÀI KHOẢN</label>
                    </div>
<!----------------->
                <!--
                    <div class="khung_giua">

                    </div>
                -->
<!----------------->
                    <div class="khung_duoi" style="margin-top: 5%;">
                        <div id="content" style="margin-left: 5%;">
                            <form method="post" style="display:flex; flex-direction:column;">

                                <label>ID tài khoản cần sửa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="id_tk" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="id_tk" value="" readonly>';
                                }
                                ?></br>

                                <label>Tên tài khoản:</label>
                                <input type="text" name="ten_tk" required><br>

                                <label>Mật khẩu:</label>
                                <input type="password" name="pass" required><br>

                                <label>Chủ sở hữu tài khoản:</label>
                                <select style="height: 22px;" name="id_nhanvien" required>
                                    <?php
                                    $nhanVienSql = "SELECT id, hoten FROM nhan_vien ORDER BY hoten ASC";
                                    $nhanVienStmt = $conn->prepare($nhanVienSql);
                                    $nhanVienStmt->execute();
                                    $nhanVienResult = $nhanVienStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($nhanVienResult as $nhanVien) : ?>
                                        <option value="<?php echo htmlspecialchars($nhanVien['id']); ?>">
                                            <?php echo htmlspecialchars($nhanVien['hoten']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                <label>Quyền hạn:</label>
                                <select style="height: 22px;" name="phanquyen" required>
                                    <?php
                                    $phanQuyenSql = "SELECT id, phan_quyen FROM phan_quyen ORDER BY phan_quyen ASC";
                                    $phanQuyenStmt = $conn->prepare($phanQuyenSql);
                                    $phanQuyenStmt->execute();
                                    $phanQuyenResult = $phanQuyenStmt->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($phanQuyenResult as $phanQuyen) : ?>
                                        <option value="<?php echo htmlspecialchars($phanQuyen['id']); ?>">
                                            <?php echo htmlspecialchars($phanQuyen['phan_quyen']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select><br>

                                <label>Ghi chú:</label>
                                <input type="text" name="ghichu" value="(không)" required><br>
                                <input type="submit" value="Sửa" name="submit" id="themmoi" style="width: 120px; height: 40px">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script src="nhaphang.js" defer></script>

    <script>
        function validateForm() {
            var idtk = document.getElementsByName('id_tk')[0];

            if (idtk.value === "") {
                alert("Vui lòng quay lại màn hình chính và chọn mục thông tin tài khoản cần sửa");
                return false;
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>