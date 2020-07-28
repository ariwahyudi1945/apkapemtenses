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
		<!-- text fonts -->
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<!-- ace settings handler -->
		<script src="../assets/js/ace-extra.min.js"></script>
		<script type="text/javascript" src="../assets/DataTables/media/js/jquery.js"></script>
		<script type="text/javascript" src="../assets/DataTables/media/js/jquery.dataTables.min.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" type="text/css" href="../assets/DataTables/media/css/dataTables.bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../assets/DataTables/media/js/dataTables.bootstrap.min.js">
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
								<img class="nav-user-photo" src="../assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['username']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
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
						<a href="dt_soal_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Soal </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li>
						<a href="dt_nilai_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Nilai Mahasiswa </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li>
						<a href="dt_jurusan_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Jurusan </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li>
						<a href="dt_peraturan_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Peraturan </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li class="active">
						<a href="dt_modul_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Modul </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> User</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="dt_mhs_tampil.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Mahasiswa
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="dt_dosen_tampil.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Dosen
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
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
								<a href="index.php">Admin</a>
							</li>
							<li class="active">Data Modul</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										<div>
											<a href="dt_modul_tambah.php"><button class="btn btn-sm btn-primary"><i class="ace-icon fa fa-plus"></i> Tambah Data</button></a><br><br>
										</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div class="table-responsive">
											<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
							                  <thead>
							                    <tr>
							                      <th>No</th>
							                      <th>Judul Modul</th>
							                      <th>Modul</th>
							                      <th>Penginput Modul</th>
							                      <th>Aksi</th>
							                    </tr>
							                  </thead>
							                  <tbody>
							                    <?php 
							                      include '../koneksi.php';
							                      $tampil=mysqli_query($koneksi, "SELECT * FROM modul, dosen WHERE modul.id_dosen=dosen.id_dosen ORDER BY judul DESC") or die(mysqli_error());

							                      $no=0;
							                      while ($data=mysqli_fetch_array($tampil)) {
							                          $no++;
							                          $id_modul=$data['id_modul'];
							                          ?>
							                    <tr>
							                      <td><?= $no; ?></td>
							                      <td><?= $data['judul']; ?></td>
							                      <td><?= $data['modul']; ?></td>
							                      <td><?= $data['nama_dosen']; ?></td>
							                      <td width="11%">
						                            <a href="#"><button class="btn btn-xs btn-info" title="Edit Data" data-toggle="modal" data-target="#myModaledit<?php echo $data['id_modul']; ?>">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
													</button></a>

													<a href="dt_modul_hapus_proses.php<?php echo '?id_modul=' . $id_modul; ?>" onclick="javascript: return confirm('Are you sure you want to delete?')" target=""><button class="btn btn-xs btn-danger" title="Hapus Data">
														<i class="ace-icon fa fa-trash-o bigger-120"></i>
													</button></a>
						                          </td>
							                    </tr>

							                    <div class="modal fade" id="myModaledit<?php echo $data['id_modul']; ?>" tabindex="-1" role="dialog">
							                      <div class="modal-dialog" role="document">
							                          <div class="modal-content">
							                              <div class="modal-header">
							                                  <h4 class="modal-title" id="defaultModalLabel">Edit Data Modul</h4>
							                              </div>
							                              <div class="modal-body">
							                                  <form role="form" action="dt_modul_edit_proses.php" method="post" enctype="multipart/form-data" onsubmit="return validasi(this)">
							                                      <?php
							                                      $id_modul = $data['id_modul']; 
							                                      $query_edit = mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='$id_modul'");
							                                      //$result = mysqli_query($conn, $query);
							                                      while ($row = mysqli_fetch_array($query_edit)) {  
							                                      ?>
							                                      <input type="hidden" name="id_modul" value="<?php echo $row['id_modul']; ?>">

							                                      <div class="form-group">
							                                          <label class="bmd-label-floating">ID Modul</label>
							                                          <input type="text" value="<?= $row['id_modul'] ?>" name="id_modul" class="form-control" readonly>      
							                                      </div>

							                                      <div class="form-group">
							                                          <label class="bmd-label-floating">Judul Modul</label>
							                                          <input type="text" value="<?= $row['judul'] ?>" name="judul" class="form-control" autocomplete="off" required>      
							                                      </div>

							                                      <div class="form-group">
							                                          <label>Penginput Modul</label>
							                                          <?php
							                                            //menu drop down
							                                            include('../koneksi.php');
							                                            $res = mysqli_query($koneksi, "SELECT * FROM modul, dosen WHERE modul.id_dosen=dosen.id_dosen AND id_modul='$id_modul'");
							                                            $data=mysqli_fetch_array($res);
							                                            $result = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY nama_dosen");
							                                            echo '<select name="id_dosen" class="form-control" required>';
							                                            echo '<option value="'. $data['id_dosen'].'">'. $data['nama_dosen'] .'</option>';
							                                            while ($row = mysqli_fetch_array($result)) {
							                                              echo '<option value="' . $row['id_dosen'] . '">' . $row['nama_dosen'] . '</option>';
							                                            }
							                                            echo '</select>';
							                                          ?>
							                                      </div>

							                                      <div class="form-group">
							                                          <label class="bmd-label-floating">Modul</label><br>
							                                                  <span class="label-contr	ol"><?php echo $data['modul'];  ?></span>
							                                                  <input type="file" name="file" class="form-control" id="exampleInputFoto2" value="<?php echo $data['../modul/modul']; ?>">
							                                      </div>

							                                      <div class="modal-footer">
							                                          <button type="submit" name="update" value="update" class="btn btn-sm btn-primary waves-effect"  onclick="javascript: return confirm('Are you sure you want to Update?')">UPDATE</button>
							                                          <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
							                                      </div>
							                                      <?php } ?>
							                                      <div id="valid_msg"></div>  
							                                  </form>
							                              </div>
							                          </div>
							                      </div>
							                  </div>
							                  <?php } ?>
							                  </tbody>
							                </table>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
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
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>
		<script src="../assets/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="../assets/js/dataTables.buttons.min.js"></script>
		<script src="../assets/js/buttons.flash.min.js"></script>
		<script src="../assets/js/buttons.html5.min.js"></script>
		<script src="../assets/js/buttons.print.min.js"></script>
		<script src="../assets/js/buttons.colVis.min.js"></script>
		<script src="../assets/js/dataTables.select.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>

		<script type="text/javascript">
		    $(document).ready(function() {
		      $('#tabel-data').DataTable();
		    });
		</script>
		<script>
		    $(document).ready(function() {
		      $().ready(function() {
		        $sidebar = $('.sidebar');

		        $sidebar_img_container = $sidebar.find('.sidebar-background');

		        $full_page = $('.full-page');

		        $sidebar_responsive = $('body > .navbar-collapse');

		        window_width = $(window).width();

		        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

		        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
		          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
		            $('.fixed-plugin .dropdown').addClass('open');
		          }

		        }

		        $('.fixed-plugin a').click(function(event) {
		          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
		          if ($(this).hasClass('switch-trigger')) {
		            if (event.stopPropagation) {
		              event.stopPropagation();
		            } else if (window.event) {
		              window.event.cancelBubble = true;
		            }
		          }
		        });

		        $('.fixed-plugin .active-color span').click(function() {
		          $full_page_background = $('.full-page-background');

		          $(this).siblings().removeClass('active');
		          $(this).addClass('active');

		          var new_color = $(this).data('color');

		          if ($sidebar.length != 0) {
		            $sidebar.attr('data-color', new_color);
		          }

		          if ($full_page.length != 0) {
		            $full_page.attr('filter-color', new_color);
		          }

		          if ($sidebar_responsive.length != 0) {
		            $sidebar_responsive.attr('data-color', new_color);
		          }
		        });

		        $('.fixed-plugin .background-color .badge').click(function() {
		          $(this).siblings().removeClass('active');
		          $(this).addClass('active');

		          var new_color = $(this).data('background-color');

		          if ($sidebar.length != 0) {
		            $sidebar.attr('data-background-color', new_color);
		          }
		        });

		        $('.fixed-plugin .img-holder').click(function() {
		          $full_page_background = $('.full-page-background');

		          $(this).parent('li').siblings().removeClass('active');
		          $(this).parent('li').addClass('active');


		          var new_image = $(this).find("img").attr('src');

		          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
		            $sidebar_img_container.fadeOut('fast', function() {
		              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
		              $sidebar_img_container.fadeIn('fast');
		            });
		          }

		          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
		            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

		            $full_page_background.fadeOut('fast', function() {
		              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
		              $full_page_background.fadeIn('fast');
		            });
		          }

		          if ($('.switch-sidebar-image input:checked').length == 0) {
		            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
		            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

		            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
		            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
		          }

		          if ($sidebar_responsive.length != 0) {
		            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
		          }
		        });

		        $('.switch-sidebar-image input').change(function() {
		          $full_page_background = $('.full-page-background');

		          $input = $(this);

		          if ($input.is(':checked')) {
		            if ($sidebar_img_container.length != 0) {
		              $sidebar_img_container.fadeIn('fast');
		              $sidebar.attr('data-image', '#');
		            }

		            if ($full_page_background.length != 0) {
		              $full_page_background.fadeIn('fast');
		              $full_page.attr('data-image', '#');
		            }

		            background_image = true;
		          } else {
		            if ($sidebar_img_container.length != 0) {
		              $sidebar.removeAttr('data-image');
		              $sidebar_img_container.fadeOut('fast');
		            }

		            if ($full_page_background.length != 0) {
		              $full_page.removeAttr('data-image', '#');
		              $full_page_background.fadeOut('fast');
		            }

		            background_image = false;
		          }
		        });

		        $('.switch-sidebar-mini input').change(function() {
		          $body = $('body');

		          $input = $(this);

		          if (md.misc.sidebar_mini_active == true) {
		            $('body').removeClass('sidebar-mini');
		            md.misc.sidebar_mini_active = false;

		            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

		          } else {

		            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

		            setTimeout(function() {
		              $('body').addClass('sidebar-mini');

		              md.misc.sidebar_mini_active = true;
		            }, 300);
		          }

		          // we simulate the window Resize so the charts will get updated in realtime.
		          var simulateWindowResize = setInterval(function() {
		            window.dispatchEvent(new Event('resize'));
		          }, 180);

		          // we stop the simulation of Window Resize after the animations are completed
		          setTimeout(function() {
		            clearInterval(simulateWindowResize);
		          }, 1000);

		        });
		      });
		    });
		  </script>
	</body>
</html>
