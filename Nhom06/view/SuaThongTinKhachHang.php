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
<body>
     <!-- thông tin khách hàng -->
    <div class="card card-outline card-primary">
        <form method="post" action="?h=check">
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
                    <h3 class="text-info" style="font-size: 200%;">khách hàng: <b><?php echo $alm->TenKH;?></b></h3>
                        <div class="row">
                            <div class="col-md-4">
                                <img src="./view/img/1.jpg" alt="client Image" class="img-fluid bg-dark-gradient" id="cimg">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <dl>
                                <dt class="text-info" style="font-size: 200%;">id khách hàng:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->ID_KH; ?>" type="text" name = "txt_idkh" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>
                                <dt class="text-info" style="font-size: 200%;">Họ và tên:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->TenKH;?>" type="text" name = "txt_ten" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>
                                <dt class="text-info" style="font-size: 200%;">Giới tính:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->GioiTinh; ?>" type="text" name = "txt_GT" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>
                                
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl>
                                <dt class="text-info" style="font-size: 200%;">Ngày sinh:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->NgaySinh; ?>" type="text" name = "txt_ngaysinh" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>
                                <dt class="text-info" style="font-size: 200%;">Email:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->Gmail; ?>" type="text" name = "txt_gmail" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>
                                <dt class="text-info" style="font-size: 200%;">Địa chỉ:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->DiaChi; ?>" type="text" name = "txt_diachi" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm"></dd>

                                <dt class="text-info" style="font-size: 200%;">mật khẩu:</dt>
                                <dd class="fw-bold pl-3" style="font-size: 200%;"><input value="<?php echo $alm->Password; ?>" type="text" name = "txt_password" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập password"></dd>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                    
                   
                    <input type="submit" name="ntym" value="sửa" class=" btn btn-success">
                    <a href="index.php"><button type="button" class="btn btn-dark"><i class="bi bi-house"></i>Quay lại</button></a>
                   
            </div>
        </form>
    </div>
</body>
<?php
include("layout/footer.php");
?>
