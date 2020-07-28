<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tenses Learning Application</title>
		<link rel="shortcut icon" href="../img/logo.png">

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>
		<script src="../assets/jquery-ui-1.10.2/jquery-1.9.1.js" type="text/javascript"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
		<!-- session -->
		  <?php 
		    ob_start();
		    session_start();
		    error_reporting(0);

		    $sesi_username    = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
		    if ($sesi_username == NULL || empty($sesi_username) )
		    {
		        session_destroy();
		        echo "<script>alert('Pleace Login!!!')</script>";
		        echo '<script type="text/javascript">window.location="../login.php"</script>';
		        // header('Location:login.php?status=Silahkan Login');
		    }
		  ?>
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-right" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="" class="navbar-brand">
						<small>
							<img src="../img/logo2.png" width="120px;">
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo img-circle" width="40px" height="40px" src="<?php echo "../img/user/". $_SESSION['foto_user']; ?>" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['nama_user']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="change_pw.php">
										<i class="ace-icon fa fa-lock"></i>
										Change Password
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../logout.php" onclick="javascript: return confirm('Are you sure you want to leave?')">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-book"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-book"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-book"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-book"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li>
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li>
						<a href="profil_tampil.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Profil </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="peraturan_tampil.php">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text"> Practice </span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Mahasiswa</a>
							</li>
							<li class="active">Grade</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Practice Result
							</h1>
						</div><!-- /.page-header -->
						<?php 
				            include "../koneksi.php";
				            // include "config/library.php";
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
		                    //Lakukan Pengecekan  Data  dalam Database
		                   $cek=mysqli_num_rows(mysqli_query($koneksi, "SELECT id_mhs FROM nilai WHERE id_mhs='$_SESSION[iduser]'"));
		                    if ($cek < 1) {
		                    //Pemberian kondisi lulus/ tidak lulus
		                     $qry2=mysqli_query($koneksi, "SELECT nilai_min FROM peraturan");
		                     $q2=mysqli_fetch_array($qry2);
		                     $ceknilai= $q2['nilai_min'];
		                     if ($hasil >= $ceknilai) {
		                    //Lakukan Penyimpanan Kedalam Database
		                            $iduser= ucwords($_SESSION['iduser']);
		                            mysqli_query($koneksi, "INSERT INTO nilai (id_nilai,benar,salah,kosong,nilai,tgl,ket,id_mhs,status) VALUES ('','$benar','$salah','$kosong','$hasil','$tgl_sekarang','Lulus','$iduser','1')");
		                    }else {
		                    //Lakukan Penyimpanan Kedalam Database
		                            $iduser= ucwords($_SESSION['iduser']);
		                            mysqli_query($koneksi, "INSERT INTO nilai (id_nilai,benar,salah,kosong,nilai,tgl,ket,id_mhs,status) VALUES ('','$benar','$salah','$kosong','$hasil','$tgl_sekarang','Tidak Lulus','$iduser','1')");
		                    }
		                    
		                }
		                ?>
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row"><br>
									<div class="col-sm-12">
										<div class="well" align="center">
											<h2 class="green smaller lighter">Congratulations <u style="text-transform: uppercase;"><?php echo $_SESSION['nama_user']; ?></u></h2>
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
										<a href="index.php"><button class="btn btn-sm btn-primary">Back to the Dashboard</button></a>
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
		<script src="../assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
		<script type="text/javascript">
			jQuery(function($) {
			
				$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
					var color_class = $(this).find('option:selected').data('class');
					var new_class = 'widget-box';
					if(color_class != 'default')  new_class += ' widget-color-'+color_class;
					$(this).closest('.widget-box').attr('class', new_class);
				});
			
			
				// scrollables
				$('.scrollable').each(function () {
					var $this = $(this);
					$(this).ace_scroll({
						size: $this.attr('data-size') || 100,
						//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
					});
				});
				$('.scrollable-horizontal').each(function () {
					var $this = $(this);
					$(this).ace_scroll(
					  {
						horizontal: true,
						styleClass: 'scroll-top',//show the scrollbars on top(default is bottom)
						size: $this.attr('data-size') || 500,
						mouseWheelLock: true
					  }
					).css({'padding-top': 12});
				});
				
				$(window).on('resize.scroll_reset', function() {
					$('.scrollable-horizontal').ace_scroll('reset');
				});
			
				
				$('#id-checkbox-vertical').prop('checked', false).on('click', function() {
					$('#widget-toolbox-1').toggleClass('toolbox-vertical')
					.find('.btn-group').toggleClass('btn-group-vertical')
					.filter(':first').toggleClass('hidden')
					.parent().toggleClass('btn-toolbar')
				});
			
				/**
				//or use slimScroll plugin
				$('.slim-scrollable').each(function () {
					var $this = $(this);
					$this.slimScroll({
						height: $this.data('height') || 100,
						railVisible:true
					});
				});
				*/
				
			
				/**$('.widget-box').on('setting.ace.widget' , function(e) {
					e.preventDefault();
				});*/
			
				/**
				$('.widget-box').on('show.ace.widget', function(e) {
					//e.preventDefault();
					//this = the widget-box
				});
				$('.widget-box').on('reload.ace.widget', function(e) {
					//this = the widget-box
				});
				*/
			
				//$('#my-widget-box').widget_box('hide');
			
				
			
				// widget boxes
				// widget box drag & drop example
			    $('.widget-container-col').sortable({
			        connectWith: '.widget-container-col',
					items:'> .widget-box',
					handle: ace.vars['touch'] ? '.widget-title' : false,
					cancel: '.fullscreen',
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'widget-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					start: function(event, ui) {
						//when an element is moved, it's parent becomes empty with almost zero height.
						//we set a min-height for it to be large enough so that later we can easily drop elements back onto it
						ui.item.parent().css({'min-height':ui.item.height()})
						//ui.sender.css({'min-height':ui.item.height() , 'background-color' : '#F5F5F5'})
					},
					update: function(event, ui) {
						ui.item.parent({'min-height':''})
						//p.style.removeProperty('background-color');
			
						
						//save widget positions
						var widget_order = {}
						$('.widget-container-col').each(function() {
							var container_id = $(this).attr('id');
							widget_order[container_id] = []
							
							
							$(this).find('> .widget-box').each(function() {
								var widget_id = $(this).attr('id');
								widget_order[container_id].push(widget_id);
								//now we know each container contains which widgets
							});
						});
						
						ace.data.set('demo', 'widget-order', widget_order, null, true);
					}
			    });
				
				
				///////////////////////
			
				//when a widget is shown/hidden/closed, we save its state for later retrieval
				$(document).on('shown.ace.widget hidden.ace.widget closed.ace.widget', '.widget-box', function(event) {
					var widgets = ace.data.get('demo', 'widget-state', true);
					if(widgets == null) widgets = {}
			
					var id = $(this).attr('id');
					widgets[id] = event.type;
					ace.data.set('demo', 'widget-state', widgets, null, true);
				});
			
			
				(function() {
					//restore widget order
					var container_list = ace.data.get('demo', 'widget-order', true);
					if(container_list) {
						for(var container_id in container_list) if(container_list.hasOwnProperty(container_id)) {
			
							var widgets_inside_container = container_list[container_id];
							if(widgets_inside_container.length == 0) continue;
							
							for(var i = 0; i < widgets_inside_container.length; i++) {
								var widget = widgets_inside_container[i];
								$('#'+widget).appendTo('#'+container_id);
							}
			
						}
					}
					
					
					//restore widget state
					var widgets = ace.data.get('demo', 'widget-state', true);
					if(widgets != null) {
						for(var id in widgets) if(widgets.hasOwnProperty(id)) {
							var state = widgets[id];
							var widget = $('#'+id);
							if
							(
								(state == 'shown' && widget.hasClass('collapsed'))
								||
								(state == 'hidden' && !widget.hasClass('collapsed'))
							) 
							{
								widget.widget_box('toggleFast');
							}
							else if(state == 'closed') {
								widget.widget_box('closeFast');
							}
						}
					}
					
					
					$('#main-widget-container').removeClass('invisible');
					
					
					//reset saved positions and states
					$('#reset-widgets').on('click', function() {
						ace.data.remove('demo', 'widget-state');
						ace.data.remove('demo', 'widget-order');
						document.location.reload();
					});
				
				})();
			
			});
		</script>
	</body>
</html>
