<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href='./view/style/css/Style.css' />
    <link rel="stylesheet" href='./view/style/css/icon.css' />
    <link rel="stylesheet" href='./view/style/css/Style2.css' />
</head>
<style>
    .tabs {
        display: flex;
        position: relative;
        margin-left: 130px;
    }
    .tabs .line {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 6px;
        border-radius: 15px;
        background-color: #c23564;
        transition: all 0.2s ease;
    }
    .tab-item {
        min-width: 80px;
        padding: 16px 20px 11px 20px;
        font-size: 20px;
        text-align: center;
        color: #c23564;
        background-color: #fff;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: 5px solid transparent;
        opacity: 0.6;
        cursor: pointer;
        transition: all 0.5s ease;
    }
    .tab-icon {
        font-size: 24px;
        width: 32px;
        position: relative;
        top: 2px;
    }
    .tab-item:hover {
        opacity: 1;
        background-color: rgba(194, 53, 100, 0.05);
        border-color: rgba(194, 53, 100, 0.1);
    }
    .tab-item.active {
        opacity: 1;
    }
    .tab-content {
        padding: 28px 0;
    }
    .tab-pane {
        color: #333;
        display: none;
        font-size: 18px;
    }
    .tab-pane.active {
        display: block;
    }
    .tab-pane h2 {
        font-size: 24px;
        margin-bottom: 8px;
    }
    table
    {
       text-align:center; 
       font-family: "Poppins", sans-serif;
    }
    p
    {
        font-size:20px;
    }
    button
    {
        text-align:center;
    }
</style>
<?php
include("layout/header.php");
$file = fopen("view/user.txt", "r");
$gmail = fread($file, filesize("view/user.txt"));
fclose($file);
include("config/connectDB.php");
$sql = "select ID_KH from khachhang where Gmail = '$gmail'";
$smt = $pdo->prepare($sql);
$smt->execute();
$thao = $smt->fetch(PDO::FETCH_ASSOC);
$chuaxuly = $this->MODEL_HD_THAO->loadChuaXuLy($thao["ID_KH"]);
$danggiao = $this->MODEL_HD_THAO->loadDangGiao($thao["ID_KH"]);
$dagiao = $this->MODEL_HD_THAO->loadDaGiao($thao["ID_KH"]);
?>
<body>

<div style="clear:both" class="container">
  <!-- Tab items -->
  <div class="tabs">
        <div class="tab-item active">
            <i class="bi bi-box-seam"></i> Đơn hàng đang chờ xác nhận
        </div>
        <div class="tab-item">
            <i class="fa fa-truck-fast"></i> Đơn hàng đang giao
        </div>
        <div class="tab-item">
            <i class="bi bi-check2-circle"></i> Đơn hàng đã giao
        </div>
        <div class="line"></div>
    </div>
    <br> <br>
    <div style="float:right">
        <p>Số lượng: <span> 0 </span> đơn hàng </p>
    </div>
    <br> <br>
  <!-- Tab content -->
    <div class="tab-content">
        <div class="tab-pane active">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($chuaxuly as $cxl)
                            {
                        ?>
                        <tr>
                            <td><?php echo $cxl['ID_HD'] ?></td>
                            <td><?php echo $cxl['NgayXuat'] ?></td>
                            <td><?php echo $cxl['ThanhTien'] ?> <span>VND</span></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Thành tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($danggiao as $dg)
                            {
                        ?>
                        <tr>
                            <td><?php echo $dg['ID_HD'] ?></td>
                            <td><?php echo $dg['NgayXuat'] ?></td>
                            <td><?php echo $dg['ThanhTien'] ?> <span>VND</span></td>
                            <td><a href="?h=check_tinhtranghd&id=<?php echo $dg['ID_HD'] ?>" class="btn btn-success">Đã nhận hàng</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($dagiao as $dg1)
                            {
                        ?>
                        <tr>
                            <td><?php echo $dg1['ID_HD'] ?></td>
                            <td><?php echo $dg1['NgayXuat'] ?></td>
                            <td><?php echo $dg1['ThanhTien'] ?> <span>VND</span></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
        </div>        
    </div>
</div>

</body>
<?php
include("layout/footer.php");
?>
<script src='view/style/js/T_js1.js'></script>
</html>