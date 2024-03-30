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
        <h2 class="text-center">THÊM SẢN PHẨM MỚI</h2>
        <form method="post" action="?h=checkAdd" enctype="multipart/form-data">
            <div class="form-group">
                <label for="txt_hoten">Tên sản phẩm</label>
                <input type="text" name = "txt_hoten" class="form-control" id="txt_hoten" aria-describedby="emailHelp" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="txt_loai">Loại sản phẩm</label>
                <select class="form-select" aria-label="Loại sản phẩm" name="select" id="select">
                    <option value="L001">Pudding</option>
                    <option value="L002">Bánh tráng</option>
                    <option value="L003">Bim bim</option>
                    <option value="L004">Trái cây sấy</option>
                    <option value="L005">Thịt sấy khô</option>
                </select>
            </div>
            <div class="form-group">
                <label for="txt_hinh">Hình ảnh</label>
                <input type="file" class="form-control" name="image" required="required" id="image">
            </div>
            <div class="form-group">
                <label for="txt_hoten">Giá</label>
                <input type="number" name = "txt_gia" class="form-control" id="txt_gia" aria-describedby="emailHelp" placeholder="Nhập giá sản phẩm">
            </div>
            <div class="form-group">
                <label for="txt_sl">Số lượng</label>
                <input name = "txt_sl" type="number" class="form-control" id="txt_soluong" aria-describedby="emailHelp" placeholder="Nhập số lượng">
            </div>

            <div class="form-group">
                <label for="txt_khoiluong">Khối lượng</label>
                <input type="number" class="form-control" id="txt_khoiluong" name="txt_khoiluong" aria-describedby="emailHelp" placeholder="Nhập khối lượng">
            </div>
            <div class="form-group">
                <input type="radio" id="btn" name="btn" value="gr" checked> Gram &nbsp; &nbsp;
                <input type="radio" id="btn" name="btn" value="kg"> Kilogram
            </div>
            <br>
            <input type="submit" name="ntym" value="CheckAdd" class=" btn btn-success">
        </form>
    </div>
</div>
</body>
</html>