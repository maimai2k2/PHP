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
$nhanvien = $this->MODEL_NV_THAO->getEmployee();
?>
<body>
<h2 class="text-center">Quản lý nhân viên</h2>

<button class="btn btn-success"> Thêm nhân viên </button>
<br> <br>

<table class="table">
    <tr>
        <th>
            Mã nhân viên
        </th>
        <th>
            Tên nhân viên
        </th>
        <th>
            Giới tính
        </th>
        <th>
            Tình trạng làm việc 
        </th>
        <th>
        </th>
    </tr>
<?php
foreach($nhanvien as $nv)
{
?>
    <tr>
        <td>
            <?php echo $nv->ID_NV ?>
        </td>
        <td>
        <?php echo $nv->TenNV ?>
        </td>
        <td>
            <?php echo $nv->GioiTinh ?>
        </td>
        <td>
            <?php echo $nv->TinhTrangLamViec ?>
        </td>
        <td>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#xoa_<?php echo $nv->ID_NV ?>">
            Xóa
            </button>
            <!-- Modal -->
            <div class="modal" id="xoa_<?php echo $nv->ID_NV?>" tabindex="-1" role="dialog" aria-labelledby="xoa_<?php echo $nv->ID_NV ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="xoa_<?php echo $nv->ID_NV ?>">Thông báo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc muốn xóa nhân viên này?
                        </div>
                        <div class="modal-footer">
                            <a href="?h=updateNV&id=<?php echo $nv->ID_NV ?>" class="btn btn-danger">XÓA</a>
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