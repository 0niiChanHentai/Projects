<?php
    $conn = mysqli_connect("localhost","root","","quancaphe");
    $id = $_GET['id'];
    $sql = "SELECT * FROM san_pham WHERE masp = '$id' ";
    $query = mysqli_query($conn, $sql);
    $cols = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
    <head>
        <title>Mộc Cafe</title>
        <meta charset="utf-8" lang="vi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../frontend/css/feindex.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/product.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/product_info.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/menu.css" type="text/css">
        <link rel="stylesheet" href="../frontend/css/slider.css" type="text/css">
    <body>
        <div class="wrapper">
            <div class="top_page">
                <?php
                    include "same/menu.php";
                ?>
            </div>          
            <div class="slider">
                <?php
                    include "same/slider.php";
                ?>
                <script src="../frontend/js/slider.js"></script>
            </div>
            <div class="content">   
                <div class="side-menu">
                    <h2>Danh muc san pham</h2>
                    <ul>Tat ca danh muc
                        <li>Danh muc 1</li>
                        <li>Danh muc 2</li>
                    </ul>
                </div>
                <div class="inform">
                    <div class="information">
                        <img src="../frontend/picture/<?php echo $cols['hinhanh']?>">
                        <div class="descript">
                            <h1><?php echo $cols['tensp']?></h1>
                            <p>Don gia : <?php echo $cols['giathanh']?> VND</p>
                            <textarea cols="80" rows="20"><?php echo $cols['mota']?></textarea>
                            <form action="addtocart.php" method="post" >
                                <div class="add-to-cart">
                                    <input type="hidden" name="ten_sanpham" value="<?php echo "$cols[tensp]"?>">
                                    <input type="hidden" name="hinh_anh" value="<?php echo "$cols[hinhanh]"?>">
                                    <input type="hidden" name="id" value="<?php echo "$cols[masp]"?>">
                                    <input type="hidden" name="don_gia" value="<?php echo "$cols[giathanh]"?>">
                                    <input type="number" name="quantity" min="1" max="999" value="1">
                                    <button class="add-cart" name="grab">Them vao gio hang</button>
                                </div>
                            </form>
                        </br>
                            <form action="buynow.php" method="post" >
                                    <input type="hidden" name="ten_sanpham" value="<?php echo "$cols[tensp]"?>">
                                    <input type="hidden" name="hinh_anh" value="<?php echo "$cols[hinhanh]"?>">
                                    <input type="hidden" name="id" value="<?php echo "$cols[masp]"?>">
                                    <input type="hidden" name="don_gia" value="<?php echo "$cols[giathanh]"?>">
                                    <button class="buy-now" name="buy">Mua ngay</button>
                            </form>    
                        </br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-sprelate">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="sp-related">
                <?php
                    $id_danhmuc = $cols['id_danhmuc'];
                    $sqlrelate = "SELECT * FROM san_pham WHERE id_danhmuc = '$id_danhmuc' ";
                    $queryrelate = mysqli_query($conn, $sqlrelate);
                    foreach( $queryrelate as $related){
                        ?>
                    <div class="sp">
                        <img src="../frontend/picture/<?php echo $related['hinhanh']?>" width="150px" height="150px"/>
                        <h3><a href="product_info.php?id=<?php echo $related['masp']?>" ><?php echo $related['tensp']?></a><h3>
                        <h3><?php echo $related['giathanh']?> VND<h3>
                    </div>    
                        <?php
                    }
                ?>
            </div>
            <div class="footer">
                <div class="info">
                    <?php
                        include "../frontend/same/footer.php";
                    ?>       
                </div>
            </div>  
        </div>
    </body>
</html>