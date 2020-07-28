<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Tenses Learning Application</title>
		<link rel="shortcut icon" href="../img/logo.png">

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="../assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="../assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="../assets/css/select2.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-editable.min.css" />

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

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
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
					<li class="active">
						<a href="profil_tampil.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Profil </span>
						</a>

						<b class="arrow"></b>
					</li>
					<li>
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
								<a href="index.php">Mahasiswa</a>
							</li>
							<li class="active">Profile</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Profil
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<div>
									<div id="user-profile-2" class="user-profile">
										<div class="tabbable">
											<div class="tab-content no-border padding-24">
												<div id="home" class="tab-pane in active">
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" style="max-width: 200px; max-height: 220px;" alt="Alex's Avatar" id="avatar2" src="<?php echo "../img/user/". $_SESSION['foto_user']; ?>" />
															</span><br><br>
															<a href="#" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#myModaledit">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
																<span class="bigger-110">Edit Profile</span>
															</a>
														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">
															<h4 class="blue">
																<span class="middle"><?php echo $_SESSION['nama_user']; ?></span>

																<span class="label label-purple arrowed-in-right">
																	<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
																	online
																</span>
															</h4>

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="profile-info-name"> NIM </div>

																	<div class="profile-info-value">
																		<span><?= $_SESSION['username'] ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Majors Studied </div>

																	<div class="profile-info-value">
																		<span><?= $_SESSION['jurusan'] ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Address </div>

																	<div class="profile-info-value">
																		<i class="fa fa-map-marker light-orange bigger-110"></i>
																		<span><?= $_SESSION['alamat'] ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Place & Date of Birth </div>

																	<div class="profile-info-value">
																		<span><?= $_SESSION['ttl'] ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Gender </div>

																	<div class="profile-info-value">
																		<span><?= $_SESSION['jenkel'] ?></span>
																	</div>
																</div>

																<div class="profile-info-row">
																	<div class="profile-info-name"> Religion </div>

																	<div class="profile-info-value">
																		<span><?= $_SESSION['agama'] ?></span>
																	</div>
																</div>
															</div>
															</div>
															<div class="modal fade" id="myModaledit" tabindex="-1" role="dialog">
													            <div class="modal-dialog" role="document">
													                <div class="modal-content">
													                    <div class="modal-header">
													                        <h4 class="modal-title" id="defaultModalLabel">Edit Profile</h4>
													                    </div>
													                    <div class="modal-body">
													                        <form role="form" action="profil_edit_proses.php" method="post" enctype="multipart/form-data">
													                            <input type="hidden" name="id" value="<?php echo $_SESSION['iduser']; ?>">

													                            <div class="form-group">
													                                <label class="bmd-label-floating">NIM</label>
													                                <input type="text" name="id" value="<?= $_SESSION['iduser'] ?>" class="form-control" readonly>      
													                            </div>

													                            <div class="form-group">
													                                <label class="bmd-label-floating">Name</label>
													                                <input type="text" value="<?= $_SESSION['nama_user'] ?>" name="nama" class="form-control" required>   
													                            </div>

													                            <div class="form-group">
													                                <label class="bmd-label-floating">Address</label>
													                                <input type="text" value="<?= $_SESSION['alamat'] ?>" name="alamat" class="form-control" required>      
													                            </div>

													                            <div class="form-group">
													                                <label class="bmd-label-floating">Place & Date of Birth</label>
													                                <input type="text" value="<?= $_SESSION['ttl'] ?>" name="ttl" class="form-control" required>   
													                            </div>

													                            <div class="form-group">
										                                            <label class="bmd-label-floating">Gender</label>
										                                            <div class="row">
																						<div class="col-sm-2">
																							<input type="radio" name="jenkel" id="form-field-1" value="Laki-Laki" <?php if($_SESSION['jenkel']=='Laki-Laki') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-10 col-sm-10">Laki-Laki</span>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-sm-2">
																							<input type="radio" name="jenkel" id="form-field-1" value="Perempuan" <?php if($_SESSION['jenkel']=='Perempuan') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-2 col-sm-10">Perempuan</span>
																						</div>
																					</div>
										                                            <!-- <input type="text" value="<?= $row['jenkel'] ?>" name="jenkel" class="form-control" autocomplete="off" required>   --> 
										                                        </div>

												                                <div class="form-group">
										                                            <label class="bmd-label-floating">Religion</label>
										                                            
										                                            <div class="row">
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Islam" <?php if($_SESSION['agama']=='Islam') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-2 col-sm-2">Islam</span>
																						</div>
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Kristen" <?php if($_SESSION['agama']=='Kristen') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-3 col-sm-2">Kristen</span>
																						</div>
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Katolik" <?php if($_SESSION['agama']=='Katolik') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-4 col-sm-2">Katolik</span>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Hindu" <?php if($_SESSION['agama']=='Hindu') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-2 col-sm-2">Hindu</span>
																						</div>
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Buddha" <?php if($_SESSION['agama']=='Buddha') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-3 col-sm-2">Buddha</span>
																						</div>
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Kong Hu Chu" <?php if($_SESSION['agama']=='Kong Hu Chu') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-4 col-sm-10">Kong Hu Chu</span>
																						</div>
																						<div class="col-sm-2">
																							<input type="radio" name="agama" id="form-field-1" value="Lainnya" <?php if($_SESSION['agama']=='Lainnya') echo 'checked'; ?> class="col-xs-1 col-sm-2" autocomplete="off" required />
																							<span class="col-xs-4 col-sm-2">Lainnya</span>
																						</div>
																					</div>
										                                            <!-- <input type="text" value="<?= $row['agama'] ?>" name="agama" class="form-control" autocomplete="off" required>    -->
										                                        </div>

													                            <div class="form-group">
													                                <label>Majors Studied</label>
													                                <?php
													                                  //menu drop down
													                                  include('../koneksi.php');
													                                  $id_mhs=$_SESSION['iduser'];
													                                  $res = mysqli_query($koneksi, "SELECT mahasiswa.id_jur, nama_jur FROM mahasiswa, jurusan WHERE mahasiswa.id_jur=jurusan.id_jur AND id_mhs='$id_mhs'");
													                                  $data2=mysqli_fetch_array($res);
													                                  $result = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY nama_jur");
													                                  echo '<select name="id_jur" class="form-control" required>';
													                                  echo '<option value="'. $_SESSION['id_jur'].'">'. $_SESSION['jurusan'] .'</option>';
													                                  while ($row = mysqli_fetch_array($result)) {
													                                    echo '<option value="' . $row['id_jur'] . '">' . $row['nama_jur'] . '</option>';
													                                  }
													                                  echo '</select>';
													                                ?>
													                            </div>

													                            <div class="form-group">
													                                <label>Foto</label><br>
													                                <div class="col-md-8"><img width="50" src="../img/user/<?php echo $_SESSION['foto_user']; ?>">
													                                    <span class="label-control"><?php echo $_SESSION['foto_user'];  ?></span><br>
													                                    <input type="file" name="file" class="form-control" id="exampleInputFoto2" value="<?php echo $data['../img/user/foto']; ?>">
													                                </div>
													                            </div><br><br><br><br>

													                            <div class="modal-footer">
													                                <button type="submit" class="btn btn-primary btn-sm waves-effect" onclick="javascript: return confirm('Are you sure you want to edit?')">UPDATE</button>
													                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
													                            </div>
													                        </form>
													                    </div>
													                </div>
													            </div>
													        </div>
														</div><!-- /.col -->
													</div><!-- /.row -->
												</div><!-- /#home -->
											</div>
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

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.gritter.min.js"></script>
		<script src="../assets/js/bootbox.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/bootstrap-datepicker.min.js"></script>
		<script src="../assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="../assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="../assets/js/select2.min.js"></script>
		<script src="../assets/js/spinbox.min.js"></script>
		<script src="../assets/js/bootstrap-editable.min.js"></script>
		<script src="../assets/js/ace-editable.min.js"></script>
		<script src="../assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="../assets/js/ace-elements.min.js"></script>
		<script src="../assets/js/ace.min.js"></script>
	</body>
</html>
