<?php
include("layout/T_admin.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thêm nhân viên</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
        <h2 class="text-center">SỬA SẢN PHẨM </h2>
        <form method="post" action="?h=check_Thao" enctype="multipart/form-data">

            <div class="form-group">
                <label for="txt_idsp">Mã sản phẩm</label>
                <input value="<?php echo $alm->ID_SP; ?>" type="text" name ="txt_idsp" class="form-control" id="txt_idsp" aria-describedby="emailHelp" readonly>
            </div>

            <div class="form-group">
                <label for="txt_hoten">Tên sản phẩm</label>
                <input value="<?php echo $alm->TenSP; ?>" type="text" name = "txt_hoten" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
            <label for="txt_loai">Loại sản phẩm</label>
                <select class="form-select" aria-label="Loại sản phẩm" name="select" id="select">
                    <?php
                        if($alm->ID_Loai=="L001")
                        {
                    ?>
                    <option value="L001" selected>Pudding</option>
                    <option value="L002">Bánh tráng</option>
                    <option value="L003">Bim bim</option>
                    <option value="L004">Trái cây sấy</option>
                    <option value="L005">Thịt sấy khô</option>
                    <?php        
                        }
                    ?>
                    <?php
                        if($alm->ID_Loai=="L002")
                        {
                    ?>
                    <option value="L001">Pudding</option>
                    <option value="L002" selected>Bánh tráng</option>
                    <option value="L003">Bim bim</option>
                    <option value="L004">Trái cây sấy</option>
                    <option value="L005">Thịt sấy khô</option>
                    <?php        
                        }
                    ?>
                    <?php
                        if($alm->ID_Loai=="L003")
                        {
                    ?>
                    <option value="L001">Pudding</option>
                    <option value="L002">Bánh tráng</option>
                    <option value="L003" selected>Bim bim</option>
                    <option value="L004">Trái cây sấy</option>
                    <option value="L005">Thịt sấy khô</option>
                    <?php        
                        }
                    ?>
                    <?php
                        if($alm->ID_Loai=="L004")
                        {
                    ?>
                    <option value="L001">Pudding</option>
                    <option value="L002">Bánh tráng</option>
                    <option value="L003">Bim bim</option>
                    <option value="L004" selected>Trái cây sấy</option>
                    <option value="L005">Thịt sấy khô</option>
                    <?php        
                        }
                    ?>
                    <?php
                        if($alm->ID_Loai=="L004")
                        {
                    ?>
                    <option value="L001">Pudding</option>
                    <option value="L002">Bánh tráng</option>
                    <option value="L003">Bim bim</option>
                    <option value="L004">Trái cây sấy</option>
                    <option value="L005" selected>Thịt sấy khô</option>
                    <?php        
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="txt_hinh">Hình ảnh</label>
                <input value="um.jpg" name ="image" type="file" class="form-control" id="image" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="txt_sl">Giá</label>
                <input value="<?php echo $alm->Gia; ?>" name = "txt_gia" type="number" class="form-control" id="txt_gia" aria-describedby="emailHelp" placeholder="Nhập số lượng">
            </div>
            <div class="form-group">
                <label for="txt_sl">Số lượng</label>
                <input value="<?php echo $alm->SoLuong; ?>" name="txt_sl" type="number" class="form-control" id="txt_soluong" aria-describedby="emailHelp" placeholder="Nhập số lượng">
            </div>

            <div class="form-group">
                <label for="txt_khoiluong">Khối lượng</label>
                <input value="<?php echo $alm->khoiluong; ?>" type="text" name ="txt_khoiluong" class="form-control" id="txt_khoiluong" aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <input type="radio" id="btn" name="btn" value="gram" checked> Gram &nbsp; &nbsp;
                <input type="radio" id="btn" name="btn" value="kg"> Kilogram
            </div>
            <br>
            <input type="submit" name="ntym" value="Check" class=" btn btn-success">
        </form>
    </div>
</div>
</body>
</html>