
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Đăng Ký</title>
	<!--
		CSS
		============================================= -->
	<?php foreach($cssFiles as $cssLink):?>
        <link href="<?php echo base_url(''.$cssLink.'')?>" rel="stylesheet">
    <?php endforeach?>
</head>
<body>
    <?=$header?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Đăng nhập/Đăng ký</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
						<a href="/buyer/login">Đăng nhập/Đăng ký</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Quay lại trang đăng nhập</h4>
							<a class="primary-btn" href="login">Quay lại</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng ký</h3>
						<form class="row login_form" action="registration" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" >
							</div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Họ và Tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'name'" >
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" onfocus="this.placeholder = ''" onblur="this.placeholder = ' Nhập lại Mật khẩu'">
							</div>
                            <div class="col-md-12 form-group">
								<input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Số điện thoại"   pattern="[0-9]{10}">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Đăng ký</button>
								<a href="#">Quên mật khẩu?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
    <?=$footer?>
	<!-- start footer Area -->
	<!-- End footer Area -->

</body>
<?php foreach($jsFiles as $jsLink):?>
        <script src="<?php echo base_url(''.$jsLink.'')?>"></script>
<?php endforeach?> 