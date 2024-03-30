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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<?php
include("layout/header.php");
?>
<body>
     <!-- thông tin khách hàng -->
    <div class="card card-outline card-primary">
        <?php 
            foreach ($KH as $k) {
        ?>
        <div class="card-header">
            <h5 class="card-title" style="font-size: 200%;">Thông tin khách hàng</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid" id="print_out">
                <style>
                    img#cimg{
                        height: 20vh;
                        width: 20vh;
                        object-fit: scale-down;
                        object-position: center center;
                    }
                </style>
                <h3 class="text-info" style="font-size: 200%;">Khách hàng: <b><?php echo $k->TenKH;?></b></h3>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./view/img/1.jpg" alt="client Image" class="img-fluid bg-dark-gradient" id="cimg">
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt class="text-info" style="font-size: 200%;">id khách hàng:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->ID_KH;?></dd>
                            <dt class="text-info" style="font-size: 200%;">Họ và tên:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->TenKH;?></dd>
                            <dt class="text-info" style="font-size: 200%;">Giới tính:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->GioiTinh; ?></dd>
                            
                        </dl>
                    </div>
                    <div class="col-md-6">
                        <dl>
                            <dt class="text-info" style="font-size: 200%;">Ngày sinh:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->NgaySinh; ?></dd>
                            <dt class="text-info" style="font-size: 200%;">Email:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->Gmail; ?></dd>
                            <dt class="text-info" style="font-size: 200%;">Địa chỉ:</dt>
                            <dd class="fw-bold pl-3" style="font-size: 200%;"><?php echo $k->DiaChi; ?></dd>

                                
                            </dd>
                        </dl>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="card-footer text-center">
            
                <a href="?h=update&id=<?php echo $k->ID_KH ?>" class="btn btn-success"><i class="fa fa-edit"></i>Sửa</a>
                <!-- <button type="button" class="btn btn-success"><i class="fa fa-edit"></i>Sửa</button> -->
                <a href="index.php"><button type="button" class="btn btn-dark"><i class="bi bi-house"></i>Quay lại</button></a>
        </div>
        <?php } ?>
    </div>
</body>
<?php
include("layout/footer.php");
?>
