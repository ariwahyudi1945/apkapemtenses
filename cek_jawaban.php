<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tenses Learning Application</title>
		<link rel="shortcut icon" href="img/logo.png">

		<meta name="description" content="top menu &amp; navigation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<img src="img/logo2.png" width="135px" >
					</a>

					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
						<span class="sr-only">Toggle user menu</span>

						<i class="fa fa-angle-down"></i>
					</button>

					<button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
						<span class="sr-only">Toggle sidebar</span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>

						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
					<ul class="nav ace-nav">
						<form class="navbar-form navbar-left form-search" role="search" action="pencarian_proses.php" method="post">
							<div class="form-group">
								<input type="text" name="search" placeholder="search" required />
							</div>

							<button type="submit" class="btn btn-mini btn-info2">
								<i class="ace-icon fa fa-search icon-only bigger-110"></i>
							</button>
						</form>
						<a href="login.php" class="navbar-form navbar-left"><button class="btn btn-warning btn-mini">Login</button></a>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="hover">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="hover">
						<a href="modul.php">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Modul </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active open hover">
						<a href="peraturan.php">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Practice </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="page-header">
							<h1>
								Practice Result
							</h1>
						</div><!-- /.page-header -->
						<?php 
	                      include "koneksi.php";
	                      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

	                      if(isset($_POST['submit'])){
	                        $kunci_jwbn=$_POST["jawab"];
	                        $id_soal=$_POST["id"];
	                        $jumlah=$_POST['jumlah'];
	                        $tgl_sekarang=date("Y-m-d");
	                        
	                        $score=0;
	                        $benar=0;
	                        $salah=0;
	                        $kosong=0;
	                            
	                        for ($i=0;$i<$jumlah;$i++){
	                          //id nomor soal
	                          $nomor=$id_soal[$i];
	                          //jika user tidak memilih jawaban
	                          if (empty($kunci_jwbn[$nomor])){
	                              $kosong++;
	                          }else{
	                            //jawaban dari user
	                            $jawaban=$kunci_jwbn[$nomor];
	                            
	                            //cocokan jawaban user dengan jawaban di database
	                            $query=mysqli_query($koneksi, "SELECT * FROM soal WHERE id_soal='$nomor' and knc_jwbn='$jawaban'");
	                            $cek=mysqli_num_rows($query);
	                            
	                            if($cek){
	                                //jika jawaban cocok (benar)
	                                $benar++;
	                            }else{
	                                //jika salah
	                                $salah++;
	                            }
	                          } 
	                            /*RUMUS
	                            Jika anda ingin mendapatkan Nilai 100, berapapun jumlah soal yang ditampilkan 
	                            hasil= 100 / jumlah soal * jawaban yang benar
	                            */
	                            $sql=mysqli_query($koneksi, "SELECT * FROM peraturan");
				                $data=mysqli_fetch_array($sql);
				                $jml_soal=$data['jml_soal'];
	                            
	                            $result=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' LIMIT $jml_soal");
	                            $jumlah_soal=mysqli_num_rows($result);
	                            $score = 100/$jumlah_soal*$benar;
	                            $hasil = number_format($score,1);
	                        }
	                      }
	                      //Pemberian kondisi lulus/ tidak lulus
	                      $qry2=mysqli_query($koneksi, "SELECT nilai_min FROM peraturan");
	                      $q2=mysqli_fetch_array($qry2);
	                      $ceknilai= $q2['nilai_min'];
	                      ?>  
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row"><br>
									<div class="col-sm-12">
										<div class="well" align="center">
											<h2 class="green smaller lighter">Congratulations, </h2>
											<h4>You have finished working on the tenses exercise. The results of Your practice.</h4>
										</div>
									</div><!-- /.col -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-xs-6 col-sm-3 pricing-box">
										<div class="widget-box widget-color-dark">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Number of correct answers</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="price">
														<?php echo $benar ?>
													</div>
												</div>

												<div>
													<a href="#" class="btn btn-block btn-inverse">
														<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-3 pricing-box">
										<div class="widget-box widget-color-orange">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Number of wrong answers</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="price">
														<?php echo $salah ?>
													</div>
												</div>

												<div>
													<a href="#" class="btn btn-block btn-warning">
														<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-3 pricing-box">
										<div class="widget-box widget-color-blue">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Number of blank answers</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="price">
														<?php echo $kosong ?>
													</div>
												</div>

												<div>
													<a href="#" class="btn btn-block btn-primary">
														<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
													</a>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-6 col-sm-3 pricing-box">
										<div class="widget-box widget-color-green">
											<div class="widget-header">
												<h5 class="widget-title bigger lighter">Your Grade</h5>
											</div>

											<div class="widget-body">
												<div class="widget-main">
													<div class="price">
														<?php echo $hasil ?>
													</div>
												</div>

												<div>
													<a href="#" class="btn btn-block btn-success">
														<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row"><br>
									<div class="col-sm-12">
										<div class="well well-sm" align="center">
											<?php 
				                              $qry=mysqli_query($koneksi, "SELECT nilai_min FROM peraturan");
				                              $q=mysqli_fetch_array($qry);
				                              $cek= $q['nilai_min'];
				                              if ($hasil >= $cek) {
				                                echo "<h3>Congratulations You <u style='text-transform: uppercase;'>graduated<u></h3>";
				                              }else {
				                                echo "<h3>Sorry You haven <u style='text-transform: uppercase;'>not graduated<u></h3>";
				                              }
				                            ?>
										</div>
									</div><!-- /.col -->
								</div><!-- /.row --><!-- PAGE CONTENT ENDS -->
								<div class="row"><br>
									<div class="col-sm-12">
										<a href="peraturan.php"><button class="btn btn-sm btn-primary">Try Again</button></a>
									</div><!-- /.col -->
								</div><!-- /.row --><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 var $sidebar = $('.sidebar').eq(0);
			 if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
			
				 var done = false;
				 $window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;
			
			
					if (scroll > 16) {			
						if(!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (17-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 $(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 });
			
			
			});
		</script>
	</body>
</html>
