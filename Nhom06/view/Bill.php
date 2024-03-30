<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href='./view/style/css/Style.css' />
    <link rel="stylesheet" href='./view/style/css/icon.css' />
    <link rel="stylesheet" href='./view/style/css/Style2.css' />
</head>
<?php
include("layout/header.php"); 
?>
<body>

    <table class="table table-hover">
        <thead>
            <tr style="background: linear-gradient(to right, #26D0CE, #1A2980)">
                <th>
                    <h3>TÊN SẢN PHẨM</h3>
                </th>
                <th>
                    <h3>HÌNH</h3>
                </th>
                <th>
                    <h3>GIÁ SẢN PHẨM</h3>
                </th>
                <th>
                    <h3>SỐ LƯỢNG</h3>
                </th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <?php

            $tongSL = 0;
            $tongTien = 0;
            $tienShip = 25000;

            // print_r($_SESSION['carts']);
            if(isset($_SESSION['carts']) && !empty($_SESSION['carts']))
            {
                foreach($_SESSION['carts'] as $key => $value)
                {
                    $tong = (float)$value["Gia"]*(int)$value["SoLuong"];
                    $tongTien += $tong;
                    $tongSL += $value['SoLuong'];	
                    $tongTien += $tienShip;
        ?>
        <tr>
            <td>
                <h4><?php echo $value['TenSP']?></h4>
            </td>
            <td width="22%"><img style="width:40%;height:40%" src="./view/img/<?php echo $value['ID_Loai']?>/<?php echo $value['ID_SP']?>/1.jpg" /></td>
            <td>
                <h4><?php echo $value['Gia']?></h4>
            </td>
            <td>
                <h4><?php echo $value['SoLuong']?></h4>
            </td>
            <?php
                }
            }
        ?>
        </tr>
        
        <tr style="background: linear-gradient(to right, #26D0CE, #1A2980)">

            <td colspan="3" style="color: red; font-weight: bold; text-align: center; padding-left: 200px;"></h3></td>
            <td style="color:red; font-weight:bold;"><h3><?php echo $tongSL?></h3></td>
            <td style="color:red; font-weight:bold;"><h3>Tiền ship: <?php echo $tienShip?></h3></td>
            <td style="color: red; font-weight: bold;"><h3>Thành tiền: <?php echo $tongTien?></h3></td>
            <td></td>
        </tr>

        
    </table>

    <div style="margin-left:300px;">
        <a href="?h=ThanhToan&id=<?php echo $value['ID_SP'] ?>">
            <button class="add-list" fdprocessedid="3bnd6k">

                <i class="fa fa-cart-plus"></i>
                <h4>Thanh toán</h4>

            </button>
        </a>
        
    </div>
    
    
</body>
<?php
include("layout/footer.php");
?>
