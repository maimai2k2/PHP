<?php
include("layout/T_admin.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="./view/style/css/T_style2.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<?php
$khachhang = $this->MODEL_KH_THAO->getCustomer();
?>
<body>
<h2 class="text-center">Quản lý khách hàng</h2>

<br> <br>

<table class="table">
    <tr>
        <th>
            Mã khách hàng
        </th>
        <th>
            Tên khách hàng
        </th>
        <th>
            Giới tính
        </th>
        <th>
        </th>
    </tr>
<?php
foreach($khachhang as $kh)
{
?>
    <tr>
        <td>
            <?php echo $kh->ID_KH; ?>
        </td>
        <td>
            <?php echo $kh->TenKH ?>
        </td>
        <td>
            <?php echo $kh->GioiTinh ?>
        </td>
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xem_<?php echo $kh->ID_KH ?>">
            Xem thông tin
            </button>
            <!-- Modal -->
            <div class="modal fade" id="xem_<?php echo $kh->ID_KH ?>" tabindex="-1" role="dialog" aria-labelledby="xem_<?php echo $kh->ID_KH ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- header -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalLabel">Thông tin khách hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- body -->
                        <div class="modal-body">  
                            <?php
                                $kh_info = $this->MODEL_KH_THAO->getCustomerInfo($kh->ID_KH);
                                foreach($kh_info as $info)
                                {
                            ?>
                                Mã khách hàng: <span style="font-weight:bold"> <?php echo $info->ID_KH; ?> </span> <br>
                                Tên khách hàng: <span style="font-weight:bold"> <?php echo $info->TenKH; ?> </span> <br>
                                Gmail: <span style="font-weight:bold"> <?php echo $info->Gmail; ?> </span> <br>
                                Giới tính: <span style="font-weight:bold"> <?php echo $info->GioiTinh; ?> </span> <br>
                                Địa chỉ: <span style="font-weight:bold"> <?php echo $info->DiaChi; ?> </span> <br>
                                Ngày sinh: <span style="font-weight:bold"> <?php echo $info->NgaySinh; ?> </span> <br>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php
}
?>
</table>
        </div>
    </div>
</body>

</html>