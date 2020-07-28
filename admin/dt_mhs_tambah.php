<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tenses Learning Application</title>
		<link rel="shortcut icon" href="../img/logo.png">

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="../assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
		<link rel="stylesheet" href="../assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
		<script src="../assets/js/ace-extra.min.js"></script>
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
					<li>
						<a href="dt_modul_tampil.php">
							<i class="menu-icon fa fa-database"></i>
							<span class="menu-text"> Data Modul </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="active">
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
							<li class="active">Tambah Data Mahasiswa</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="row">
									<div class="col-xs-12">
										<!-- PAGE CONTENT BEGINS -->
										<form class="form-horizontal" role="form" action="dt_mhs_tambah_proses.php" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIM </label>

												<div class="col-sm-9">
													<input type="text" name="id_mhs" id="form-field-1" placeholder="NIM" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>

												<div class="col-sm-9">
													<input type="text" name="nama" id="form-field-1" placeholder="Nama" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>

												<div class="col-sm-9">
													<textarea name="alamat" id="form-field-1" placeholder="Alamat" class="col-xs-10 col-sm-5" autocomplete="off" required></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat & Tanggal Lahir </label>

												<div class="col-sm-9">
													<input type="text" name="ttl" id="form-field-1" placeholder="Tempat & Tanggal Lahir" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>
												<!-- <div class="col-sm-9">
													<select name="jenkel" class="col-xs-10 col-sm-5" required>
														<option>Pilih</option>
														<option>Laki-Laki</option>
														<option>Perempuan</option>
													</select>
												</div> -->
												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="jenkel" id="form-field-1" value="Laki-Laki" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-10 col-sm-10">Laki-Laki</span>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="jenkel" id="form-field-1" value="Perempuan" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-2 col-sm-10">Perempuan</span>
														</div>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Agama </label>

												<div class="col-sm-9">
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Islam" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-2 col-sm-2">Islam</span>
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Kristen" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-3 col-sm-2">Kristen</span>
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Katolik" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-4 col-sm-2">Katolik</span>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Hindu" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-2 col-sm-2">Hindu</span>
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Buddha" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-3 col-sm-2">Buddha</span>
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Kong Hu Chu" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-4 col-sm-10">Kong Hu Chu</span>
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Lainnya" class="col-xs-1 col-sm-2" autocomplete="off" required />
															<span class="col-xs-4 col-sm-2">Lainnya</span>
														</div>
													</div>
												</div>
 
												<!-- <div class="col-sm-9">
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Islam" class="col-xs-10 col-sm-5" autocomplete="off" required />Islam
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Protestan" class="col-xs-10 col-sm-5" autocomplete="off" required />Protestan
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Katolik" class="col-xs-10 col-sm-5" autocomplete="off" required />Katolik
														</div>
													</div>
													<div class="row">
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Hindu" class="col-xs-10 col-sm-5" autocomplete="off" required />Hindu
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Buddha" class="col-xs-10 col-sm-5" autocomplete="off" required />Buddha
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Kong Hu Cu" class="col-xs-10 col-sm-5" autocomplete="off" required />Kong Hu Cu
														</div>
														<div class="col-sm-2">
															<input type="radio" name="agama" id="form-field-1" value="Lainnya" class="col-xs-10 col-sm-5" autocomplete="off" required />Lainnya
														</div>
													</div>
												</div> -->
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Username </label>
												
												<div class="col-sm-9">
													<input type="text" name="username" id="form-field-1" placeholder="Username" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>

												<div class="col-sm-9">
													<input type="password" name="password" id="form-field-1" placeholder="Password" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Foto </label>

												<div class="col-sm-9">
													<input type="file" name="file" id="form-field-1" placeholder="Foto" class="col-xs-10 col-sm-5" autocomplete="off" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jurusan </label>

												<div class="col-sm-9">
													<?php
									                    //menu drop down
									                    include('../koneksi.php');
									                    $res = mysqli_query($koneksi, "SELECT * FROM mahasiswa, jurusan WHERE mahasiswa.id_jurusan=jurusan.id_jurusan ORDER BY nama_jur DESC");
									                    $data=mysqli_fetch_array($res);
									                    $result = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY nama_jur");
									                    echo '<select name="id_jur" class="col-xs-10 col-sm-5" required>';
									                    echo '<option value="'. $data['id_jur'].'">Pilih</option>';
									                    while ($row = mysqli_fetch_array($result)) {
									                      echo '<option value="' . $row['id_jur'] . '">' . $row['nama_jur'] . '</option>';
									                    }
									                    echo '</select>';
									                  ?>
												</div>
											</div>

											<div class="clearfix form-actions">
												<div class="col-md-offset-3 col-md-9">
													<button class="btn btn-info" name="tambah" type="submit">
														<i class="ace-icon fa fa-send bigger-110"></i>
														Submit
													</button>

													&nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														Reset
													</button>
												</div>
											</div>
										</form>
									</div><!-- /.col -->
								</div><!-- /.row -->

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
	</body>
</html>
