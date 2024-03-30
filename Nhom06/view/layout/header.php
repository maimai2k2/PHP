<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <title>Home</title>
    <script src="https://kit.fontawesome.com/3809bda1bc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href='style/css/Style.css' />
    <link rel="stylesheet" href='style/css/icon.css' />
    <link rel="stylesheet" href='style/css/Style2.css' />
</head>
<?php
$file = fopen("view/user.txt", "r");
$gmail = fread($file, filesize("view/user.txt"));
fclose($file);
include("config/connectDB.php");
$sql = "select ID_KH from khachhang where Gmail = '$gmail'";
$smt = $pdo->prepare($sql);
$smt->execute();
$thao = $smt->fetchAll(PDO::FETCH_BOTH);
?>
<?php

$tongSL = 0;
$tongTien = 0;

// print_r($_SESSION['carts']);
if(isset($_SESSION['carts']) && !empty($_SESSION['carts']))
{
    foreach($_SESSION['carts'] as $key => $value)
    {
        $tong = (float)$value["Gia"]*(int)$value["SoLuong"];
        $tongTien += $tong;
        $tongSL += $value['SoLuong'];	
    }
}
?>
<body>
    <div class="main">

        <!-- ============ start Header ============= -->
        <header class="header">
            <!-- phần Navbar -->
            <nav class="header__navbar navbar sticky-top">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--strong">

                        <a href="?h=SanPham" class="header__navbar-icon--link header__navbar-item--separate">
                            <i class="hheader__navbar-icon fas fa-home header__nav-notice"></i> Trang chủ
                        </a>
                    </li>

                    <li class="header__navbar-item header__navbar-item--separate">
                        <?php
                            foreach($thao as $t)
                            {
                        ?>
                        <a href="?h=ChiTietKhachHang&id=<?php echo $t['ID_KH']; ?>" class=" header__navbar-icon--link" onclick="arlet_account()">
                            <i class="header__navbar-icon fas fa-user header__nav-notice"> </i> Tài khoản <?php echo $t['ID_KH']; ?>
                        </a>
                        <?php
                            }
                        ?>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="container h-100" >
                        <form method="post" action="?h=TimKiem">
                        <div class="d-flex justify-content-center h-100">
                            <div class="searchbar">
                                <input class="search_input" type="text" name="search" placeholder="Tìm kiếm tại đây...">
                                <button class="search_icon" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        </form>
                    </li>
                    <li class="header__navbar-item header__navbar-item--thongbao active" style="margin-top: 10px;">
                        <a href="" class="header__navbar-item--link " style="width: 80px">
                            Thông báo
                            <i class="header__navbar-icon fas fa-bell header__nav-notice"></i>
                        </a>
                        <div class="header__notify">
                            <header class="header__notify-header">
                                <h3>Lịch sử</h3>
                            </header>
                            <div class="noproduct" style="padding:10px 0;">
                                <p style="color: black;font-weight: 400; font-size:1.4rem;text-align: center;">Bạn chưa mua sản phẩm nào</p>
                            </div>
                            <!-- tạo nút xem tất cả -->
                            <footer class="header__notify-footer">
                                <a href="?h=lichsumuahang" class="header__notify-footer-btn">Xem tất cả</a>
                            </footer>
                        </div>
                    </li>
                    <li class="header__navbar-item" style="margin-right: -50px">
                        <a href="" class="header__navbar-item--link" style="width: 80px">
                            Trợ giúp
                            <i class="header__navbar-icon far fa-question-circle"></i>
                        </a>
                    </li>
                    <!--  giỏ hàng -->
                    <li>
                        
                        <div class="header__cart">
                            <a href="">
                                <i class="header__cart-icon fas fa-shopping-cart"></i>
                                <span class="header__cart-notice"><?php echo $tongSL?></span>

                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- start nav -->
            <div class="nav nav-fixed" style="background: #000428;  /* fallback for old browsers */
                    background: -webkit-linear-gradient(to right, #004e92, #000428);  /* Chrome 10-25, Safari 5.1-6 */
                    background: linear-gradient(to right, #004e92, #000428);/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                    ">
                <ul class="nav-list">
                    <li class="menu-lv1 test-menu">
                        <a href="?h=PhanLoai&loai=L001">PUDDING</a>
                        <ul class="container-menu-lv2">
                            <li class="container-menu-lv3"><a href="#">Kẹo dẻo</a></li>
                            <li class="container-menu-lv3"><a href="#">Thạch dừa</a></li>
                        </ul>
                    </li>
                    <li class="menu-lv1 test-menu"><a href="?h=PhanLoai&loai=L002">BÁNH TRÁNG</a></li>
                    <li class="menu-lv1 test-menu"><a href="?h=PhanLoai&loai=L003">BIMBIM</a>
                       
                    </li>
                    <li class="menu-lv1 test-menu">
                        <a href="?h=PhanLoai&loai=L004">TRÁI CÂY SẤY</a>
                        <ul class="container-menu-lv2">
                            <li class="container-menu-lv3"><a href="">Trái cây sấy dẻo</a></li>
                            <li class="container-menu-lv3"><a href="">Trái cây sấy giòn</a></li>

                        </ul>
                    </li>
                    <li class="menu-lv1 test-menu">
                        <a href="?h=PhanLoai&loai=L005">THỊT SẤY KHÔ</a>
                        <ul class="container-menu-lv2">
                            <li class="container-menu-lv3"><a href="">Thịt sấy</a></li>
                            <li class="container-menu-lv3"><a href="">Hải sản sấy</a></li>

                        </ul>
                    </li>
                   
                </ul>
            </div>
        </header>

        <!-- end nav -->
        <!-- ============ end Header ============= -->
        <!-- =============start slider========== -->
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="margin-top: -120px ">

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./view/img/1.jpg" class="d-block w-100" style="height: 700px; width: 100%">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./view/img/2.jpg" class="d-block w-100" style="height: 700px; width: 100%">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="./view/img/3.jpg" class="d-block w-100" style="height: 700px; width: 100%">
                </div>
                <div class="carousel-item">
                    <img src="./view/img/4.jpg" class="d-block w-100" style="height: 700px; width: 100%">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
  
</body>
</html>