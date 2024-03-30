<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details Page</title>
    <link rel="stylesheet" href="./view/style/css/ThongTinKhachHang.css">
    <link rel="stylesheet" href='./view/style/css/Style.css' />
    <link rel="stylesheet" href='./view/style/css/icon.css' />
    <link rel="stylesheet" href='./view/style/css/Style2.css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<?php
include("layout/header.php");
?>
<body>
    <div class="flex-box" style="
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;">
        <div class="left_img">
            <div class="big-img">
                <img style = "width: 140%; height: 100%;"  src="./view/img/<?php echo $SP->ID_Loai?>/<?php echo $SP->ID_SP?>/1.jpg">
            </div>
            <div class="images" style="margin-left:50px;">
                <div class="small-img">
                    <img style = "width: 100%; height: 100%;" src="./view/img/<?php echo $SP->ID_Loai?>/<?php echo $SP->ID_SP?>/1.jpg" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img style = "width: 100%; height: 100%;" src="./view/img/<?php echo $SP->ID_Loai?>/<?php echo $SP->ID_SP?>/2.jpg" onclick="showImg(this.src)">
                </div>
                <div class="small-img">
                    <img style = "width: 100%; height: 100%;" src="./view/img/<?php echo $SP->ID_Loai?>/<?php echo $SP->ID_SP?>/3.jpg" onclick="showImg(this.src)">
                </div>
            </div>
        </div>

        <div class="right">
            <div class="url">GioHang > <?php echo $SP->TenSP; ?></div>
            <div class="pname"><?php echo $SP->TenSP; ?></div>
            <div class="ratings">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="price"><?php echo $SP->Gia; ?></div>
            <div class="size">
                <p style="font-size: 18px; font-weight: 500;">Khối Lượng :</p>
                <div class="psize active"><?php echo $SP->KhoiLuong; ?></div>
            </div>
            <div class="quantity">
                <p style="font-size: 18px; font-weight: 500;">Quantity :</p>
                <!-- <?php echo $SP->SoLuong; ?> -->
                <input style = "width: 50px;" type="number" min="1" max="5" value="1">
            </div>
            <div class="btn-box">
                <a href="?h=GioHang&id=<?php echo $SP->ID_SP; ?>" class="btn btn-danger">Thêm vào giỏ hàng</a>
                <a href="?h=GioHang&id=<?php echo $SP->ID_SP; ?>" class="btn btn-primary" style = "margin-left: 20px">mua ngay</a>
            </div>
        </div>
    </div>


    <script>
        let bigImg = document.querySelector('.big-img img');
        function showImg(pic){
            bigImg.src = pic;
        }
    </script>
</body>
<br/>
<br/>
<?php
include("layout/footer.php");
?>
</html>