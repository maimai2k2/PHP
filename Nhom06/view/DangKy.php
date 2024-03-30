<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="img/png" href="view/img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/style/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/style/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="view/style/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/style/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="view/style/css/util.css">
	<link rel="stylesheet" type="text/css" href="view/style/css/main2.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
	<form method="post" action="?h=register" enctype="multipart/form-data">
	<div class="container-login100" style="background-image:url(view/img/2.jpg);">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="view/img/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form">
					<span class="login100-form-title">
						Đăng Ký
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Bạn cần nhập tên !!!">
						<input class="input100" type="text" name="name" placeholder="Tên khách hàng" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Bạn cần nhập địa chỉ !!!">
						<input class="input100" type="text" name="address" placeholder="Địa chỉ" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Bạn cần nhập tài khoản !!!">
						<input class="input100" type="text" name="account" placeholder="Tài Khoản" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Bạn cần nhập mật khẩu !!!">
						<input class="input100" type="password" name="pass" placeholder="Mật Khẩu" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Bạn cần nhập mật khẩu !!!">
						<input class="input100" type="password" name="password" placeholder="Nhập Lại Mật Khẩu" required="required">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" onclick="kiemTra();">
							Đăng ký
						</button>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn1" formaction="?h=DangNhap">
							Đã có tài khoản
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</form>	
</div>
	
	

	
<!--===============================================================================================-->	
	<script src="view/style/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="view/style/vendor/bootstrap/js/popper.js"></script>
	<script src="view/style/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="view/style/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="view/style/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->

</body>
<script>
    function kiemTra()
    {
        var tenKH = docmunent.getElementById("name");
		var diachi =document.getElementById("address");
        var emailKH = document.getElementById("account");
        var matkhau = document.getElementById("pass");
        if(tenKH.value == "")
        {
            alert("Vui lòng nhập tên");
            tenKH.focus();
            return false;
        }
        if(emailKH.value == "")
        {
            alert("Vui lòng nhập email");
            emailKH.focus();
            return false;
        }
        if(diachi.value == "")
        {
            alert("Vui lòng nhập địa chỉ");
            diachi.focus();
            return false;
        }
		if(matkhau.value == "")
		{
			alert("Nhập mật khẩu");
            matkhau.focus();
            return false;
		}
        if(tenKH.value != "" && emailKH.value != "" && diachi.value != "" && matkhau.value != "")
        {
            return true;
        }
    }
</script>
</html>