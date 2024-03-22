
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item "><a class="nav-link" href="/">Trang chủ</a></li>
							<li class="nav-item submenu dropdown">
								<a href="/san-pham" class="nav-link ">Sản phẩm</a>
							</li>
							<!-- <li class="nav-item"><a class="nav-link" href="/buyer/login">Đăng Nhập</a></li> -->
							<?php
								$session = \Config\Services::session();
								$name = $session->get('name');
						
								if ($name){
									echo  '<li class="nav-item submenu dropdown">
												<span class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
												aria-expanded="false">'.$name.'</span>
												<ul class="dropdown-menu">
													<li class="nav-item"><a class="nav-link" href="'.base_url('buyer/logout').'">Đăng Xuất</a></li>
												</ul>
											</li>';	
								}
								else{
									echo '<li class="nav-item"><a class="nav-link" href="/buyer/login">Đăng Nhập</a></li>';
								}
							?>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="<?php echo base_url('cart')?>" class="cart"><span class="ti-bag"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>