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
<?php
include("./view/SendMail.php");

$file = fopen("./view/user.txt", "r");
$gmail = fread($file, filesize("./view/user.txt"));
// echo $gmail;
fclose($file);
$ten = "Nhóm 06";
$noiDung = "Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn sẽ được xử lý nhanh thôi. Hãy theo dõi đơn hàng trên website nhé!!!";
$tieuDe = "Nhóm 06 _ Website bán đồ ăn vặt";
$email = khoitaoMail();
$email->addAddress($gmail, $ten);
$email->Subject = $tieuDe;
$email->Body = $noiDung;
?>
<body>
    <h1 style ="text-align: center">ĐẶT HÀNG THÀNH CÔNG</h1>

</body>
<?php
include("layout/footer.php");
?>
