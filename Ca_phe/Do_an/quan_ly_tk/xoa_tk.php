<?php
include '../ket_noi.php';

if($conn){
}
else{
    echo ("Ket noi database that bai");
}

try{
    if(empty($_POST['submit'])){
       $sql = "SELECT * FROM nhap_hang ORDER BY thoigiannhap DESC";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       $result = array();
       while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $result[] = $row;
       }
    }
    if (!empty($_POST['submit'])) {
       $id_tk = $_POST['id_tk'];
 
       $sql = "DELETE FROM tai_khoan WHERE id_tk = '$id_tk'";
       $stmt = $conn->prepare($sql);
       $query = $stmt->execute();
       header('location: tai_khoan.php');
    } 

}
catch(Exception){
    header('location: tai_khoan.php');
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
                        <label class="title">XÓA THÔNG TIN TÀI KHOẢN</label>
                    </div>
<!----------------->
                    <div class="khung_duoi">
                        <div id="content">
                            <form method="post" style="display:flex; flex-direction:column;">
                                <label>ID tài khoản cần xóa:</label>
                                <?php
                                if (isset($_POST['buttonValue'])) {
                                    $buttonValue = $_POST['buttonValue'];
                                    echo '<input type="text" name="id_tk" value="' . $buttonValue . '" readonly>';
                                } else {
                                    echo '<input type="text" name="id_tk" value="" readonly>';
                                }
                                ?><br>
                                <input type="submit" value="Xóa" name="submit" id="xoabo" onclick="return confirmDelete()">
                            </form>
                        </div>
                    </div>
<!----------------->
<!----------------------------------------------------------------------------------------------------------------------------------------->
<?php include '../khung_giao_dien/duoi.php'; ?>
<!----------------------------------------------------------------------------------------------------------------------------------------->
    <script>
        function confirmDelete() {
            var nhapHang = document.getElementsByName('id_tk')[0];
            if (nhapHang.value === "") {
                alert("Vui lòng nhập đầy đủ thông tin.");
                header('location: tai_khoan.php');
            }
            else {
                var result = confirm("Bạn có muốn xóa tài khoản này không?");
                if (result) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    </script>
<!----------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>