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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>
<?php
$hoadon = $this->MODEL_HD_THAO->getInvoices();
?>
<body>
<h2 class="text-center">Quản lý đơn hàng</h2>
<br> <br>
<table class="table">
    <tr>
        <th>
            Mã đơn hàng
        </th>
        <th>
            Ngày xuất
        </th>
        <th>
            Thành tiền
        </th>
        <th>
        </th>
    </tr>
<?php
foreach($hoadon as $hd)
{
    if($hd->TinhTrangGiaoHang == 'Chưa xử lý')
    {
?>
    <tr style="background-color:antiquewhite">
        <td>
            <?php echo $hd->ID_HD; ?>
        </td>
        <td>
            <?php echo $hd->NgayXuat; ?>
        </td>
        <td>
            <?php echo $hd->ThanhTien ?> VND
        </td>
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xem_<?php echo $hd->ID_HD ?>">
            Xem
            </button>

            <!-- Modal -->
            <div class="modal fade" id="xem_<?php echo $hd->ID_HD ?>" tabindex="-1" role="dialog" aria-labelledby="xem_<?php echo $hd->ID_HD ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="xem_<?php echo $hd->ID_HD ?>">Đơn hàng <span> <?php echo $hd->ID_HD ?> </span> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p style="color:black; text-align: right">Ngày xuất: <?php echo $hd->NgayXuat ?></p>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $info_hd = $this->MODEL_CTHD_THAO->getInvoicesInfo($hd->ID_HD);
                                foreach($info_hd as $info)
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $info->tensp ?></td>
                                        <td><?php echo $info->SoLuong ?></td>
                                        <td><?php echo $info->Gia ?></td>
                                        <td><?php echo $info->ThanhTien ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                <?php
                                $total = $this->MODEL_CTHD_THAO->getTotalPrice($hd->ID_HD);
                                foreach($total as $t)
                                { 
                                ?>
                                    <th colspan="2" style="text-align:right"> <span> <?php echo $t->TongTien ?> VND </span> </th>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <?php
                                $thao = $this->MODEL_HD_THAO->displayButton($hd->ID_HD);
                                if($thao == 0)
                                {
                                    ?>
                                        <a href="?h=deleteInvoice&id=<?php echo $hd->ID_HD ?>" class="btn btn-danger"> Hủy đơn hàng </a>;
                                        <a href="?h=updateInvoice_admin&id=<?php echo $hd->ID_HD ?>" class="btn btn-success">Xác nhận đơn hàng</a>;
                                    <?php 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php
    }
    else
    {
?>
        <tr>
        <td>
            <?php echo $hd->ID_HD; ?>
        </td>
        <td>
            <?php echo $hd->NgayXuat; ?>
        </td>
        <td>
            <?php echo $hd->ThanhTien ?> VND
        </td>
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xem_<?php echo $hd->ID_HD ?>">
            Xem
            </button>

            <!-- Modal -->
            <div class="modal fade" id="xem_<?php echo $hd->ID_HD ?>" tabindex="-1" role="dialog" aria-labelledby="xem_<?php echo $hd->ID_HD ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="xem_<?php echo $hd->ID_HD ?>">Đơn hàng <span> <?php echo $hd->ID_HD ?> </span> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p style="color:black; text-align: right">Ngày xuất: <?php echo $hd->NgayXuat ?></p>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $info_hd = $this->MODEL_CTHD_THAO->getInvoicesInfo($hd->ID_HD);
                                foreach($info_hd as $info)
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $info->tensp ?></td>
                                        <td><?php echo $info->SoLuong ?></td>
                                        <td><?php echo $info->Gia ?></td>
                                        <td><?php echo $info->ThanhTien ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                </tbody>
                                <tr>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                <?php
                                $total = $this->MODEL_CTHD_THAO->getTotalPrice($hd->ID_HD);
                                foreach($total as $t)
                                { 
                                ?>
                                    <th colspan="2" style="text-align:right"> <span> <?php echo $t->TongTien ?> VND </span> </th>
                                </tr>
                                <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <?php
                                $thao = $this->MODEL_HD_THAO->displayButton($hd->ID_HD);
                                if($thao == 0)
                                {
                            ?>
                                    <a href="?h=deleteInvoice&id=<?php echo $hd->ID_HD ?>" class="btn btn-danger"> Hủy đơn hàng </a>;
                                    <a href="?h=updateInvoice_admin&id=<?php echo $hd->ID_HD ?>" class="btn btn-success">Xác nhận đơn hàng</a>;
                            <?php 
                                }
                            ?>                        
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php
    }
}
?>
</table>
        </div>
    </div>
</body>

</html>