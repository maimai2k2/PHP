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
$sanpham = $this->MODEL_SP_THAO->getEmployees();
?>
<body>
<h2 class="text-center">Quản lý sản phẩm</h2>
<td>
<a href="?h=add" class="btn btn-success black z-depth-3">Thêm sản phẩm</a>
<br> <br>

<table class="table">
    <tr>
        <th>
            Mã sản phẩm
        </th>
        <th>
            Tên sản phẩm
        </th>
        <th>
            Hình
        </th>
        <th></th>
    </tr>

    <?php 
        foreach ($sanpham as $k) {
    ?>
    <tr>
        <td>
        <?php echo $k->ID_SP; ?> 
        </td>
        <td>
        <?php echo $k->TenSP; ?>
        </td>
        <td>
            <img src="./view/img/<?php echo $k->ID_Loai ?>/<?php echo $k->ID_SP ?>/<?php echo $k->HinhSP ?>" width="100px"/>
        </td>  
        <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#xem_<?php echo $k->ID_SP ?>">
            Xem 
            </button>
            <!-- Modal -->
            <div class="modal" id="xem_<?php echo $k->ID_SP ?>" tabindex="-1" role="dialog" aria-labelledby="xem_<?php echo $k->ID_SP ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="xem_<?php echo $k->ID_SP ?>">Thông tin sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                                $sp_info = $this->MODEL_SP_THAO->getProductInfo($k->ID_SP);
                                foreach($sp_info as $sp)
                                {
                            ?>
                            Mã sản phẩm: <span style="font-weight:bold"><?php echo $sp->ID_SP; ?></span> <br>
                            Tên sản phẩm: <span style="font-weight:bold"><?php echo $sp->TenSP; ?></span> <br>
                            Loại sản phẩm: <span style="font-weight:bold"><?php echo $sp->TenLoai; ?> </span> <br>
                            Số lượng: <span style="font-weight:bold"><?php echo $sp->SoLuong; ?></span> <br>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <a href="?h=update_Thao&id=<?php echo $k->ID_SP; ?>" class="btn btn-warning">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="?h=delete&id=<?php echo $k->ID_SP; ?>" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
        </div>
    </div>
</body>

</html>