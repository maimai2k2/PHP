<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href='./view/style/css/Style.css' />
    <link rel="stylesheet" href='./view/style/css/icon.css' />
    <link rel="stylesheet" href='./view/style/css/Style2.css' />
</head>
<?php
include("layout/header.php");
include("pager.php");
?>
<?php
// $ten = $_GET["search"];
// $sanpham = $this->MODEL_SANPHAM->timKiem($ten);
// $count = count($sanpham);
// $p = new Pager();
// $limit = 12;
// $count = count($sanpham);
// $vt = $p->findStart($limit);
// $pages = $p->findPages($count, $limit);
// $cur = $_GET["page"];
// $phantrang = $p->pageList($cur,$pages);
// $sanpham = $this->MODEL_SANPHAM->PhanTrang($vt, $limit);
?>
<body>
   
<div class="app__container">
    <div class="grid">
        <!-- thanh phân loại bên trái -->
        <div class="grid__row app__content">
            <!-- phần diện sản phẩm -->
            <div class="grid__column-12">
                <!-- phầm home filter -->
                <div class="home-filter">

                    <button class="home-filter__btn btn" style="font-size: 17px; margin-left: 110px">Sản phẩm bán chạy</button>
                    <button class="home-filter__btn btn " style="font-size: 17px;">Sản phẩm mới</button>
                    <button class="home-filter__btn btn" style="font-size: 17px;">Sản phẩm đang giảm giá</button>
                </div>
                <!-- phần sản phẩm 1 -->
                <div class="home-product active ">
                    <div class="grid__row">
                        <!-- sản phẩm -->
                        <!-- product item -->
                        <?php
                            foreach($sanpham as $sp){
                        ?>
                            <div class="grid__column-12-6">
                                <a href="?h=ChiTietSanPham&id=<?php echo $sp->ID_SP; ?>" class=" home-product-item">
                                    <div style=" overflow: hidden;">
                                        <div class="home-product-item__img" style="background-image: url(./view/img/<?php echo $sp->ID_Loai?>/<?php echo $sp->ID_SP?>/1.jpg) ">

                                        </div>

                                    </div>
                                    <div class="home-product-item__name"><h4><?php echo $sp->TenSP; ?></h4></div>
                                    <?php
                                    $gia  = $this->MODEL_SANPHAM->getMaSP( $sp->ID_SP);
                                    ?>
                                    <?php
                                        foreach($gia as $g){
                                    ?>                    
                                        <div class="home-product-item__price">
                                            <span class="home-product-item__price-current"><?php echo $g->Gia?></span>
                                        </div>
                                        <div class="home-product-item__price">
                                        <span class="home-product-item__price-current">Số lượng: <?php echo $g->SoLuong; ?></span>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                   
                                    <div class="home-product-item__action">
                                        <span>
                                        </span>
                                        <span class="home-product-item__like">
                                            <i class="home-product-item__like-icon-fill fas fa-cart-plus"></i>
                                            <div class="home-product-item__like-ex">Thêm vào giỏ hàng</div>
                                        </span>
                                        <span>

                                        </span>
                                    </div>
                                    <div class="view">
                                        <i class="header__navbar-icon fas fa-plus"></i>
                                    </div>
                                </a>
                            </div>
                        <?php
                            }
                        ?>

                    </div>
                </div>

                    <!-- <ul class="pagination home-product__pagination">
                        <li class="pagination-item">
                            <div class="pagination-item__link">   <?php echo $phantrang ?>   </div>
                        </li>
                       
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    
</body>
<?php
include("layout/footer.php");
?>
</html>