<!DOCTYPE html>
<html lang="en">
<?php 
  include 'koneksi.php';
  $sql=mysqli_query($koneksi, "SELECT * FROM peraturan");
  $data=mysqli_fetch_array($sql);

  $telah_berlalu = 0;
  $temp_waktu = ($data['waktu_pengerjaan']*60) - $telah_berlalu;  
  $temp_menit = (int)($temp_waktu/60);
  $temp_detik = $temp_waktu%60;

  if ($temp_menit < 60) {
    $jam = 0;
    $menit = $temp_menit;
    $detik = $temp_detik;
  }else{
    $jam = (int)($temp_menit/60);
    $menit = $temp_menit%60;
    $detik = $temp_detik;
  }
 ?> 
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
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />

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
		<script src="assets/jquery-ui-1.10.2/jquery-1.9.1.js" type="text/javascript"></script>

		<script type="text/javascript">
          $(document).ready(function(){
            // membuat waktu mulai hitung mundur
            var detik = <?php echo $detik; ?>;
            var menit = <?php echo $menit; ?>;
            var jam = <?php echo $jam; ?>;

            // membuat function hitung
            function hitung(){
              setTimeout(hitung, 1000);
              if (menit<10 && jam == 0) {
                var peringatan = 'style="color:red"';
              }
              $('#timer').html(
                '<span align="center" style="color: white;"'+peringatan+'>TIME : ' + jam + ' : ' + menit + ' : ' + detik + '  </span>'
                );
              detik --;

              if (detik < 0) {
                detik = 59;
                menit --;
                if (menit < 0) {
                  menit = 59;
                  jam --;

                  if (jam < 0) {
                    clearInterval(hitung);
                    var frmSoal = document.getElementById("frmSoal").click();
                    alert('Time is over');
                    // frmSoal.submit();
                  }
                }
              }
            }
            hitung();
          });
        </script>
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
						<div class="row">
							<div class="col-sm-12" align="right">
								<p>
									<br>
									<span class="label label-xlg label-primary arrowed" id="timer"></span>
								</p>
							</div><!-- /.span -->
						</div><!-- /.row -->
						<div class="row">
							<div class="col-sm-12">
							  <div class="widget-box">
								<div class="widget-body">
									<div class="widget-main">
										<!-- JIKA INGIN MENGGUNAKAN PAGGING -->
						              <!-- <?php 
						                include 'koneksi.php';
						                $halaman = 5;
						                $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
						                $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
						                $result = mysqli_query($koneksi, "SELECT * FROM soal LIMIT 10");
						                $total = mysqli_num_rows($result);
						                $pages = ceil($total/$halaman);
						              ?> -->
						              <table width="100%" border="0">
						                <?php 
						                  include 'koneksi.php';
						                  $sql=mysqli_query($koneksi, "SELECT * FROM peraturan");
						                  $data=mysqli_fetch_array($sql);
						                  $jml_soal=$data['jml_soal'];
						                  // $hasil=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT $mulai, $halaman"); //QUERY MENGGUNAKAN PAGGING
						                  $hasil=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT $jml_soal");
						                  $jumlah=mysqli_num_rows($hasil);
						                  $urut=0; //jika ingin menggunakan pagging maka rubah menjadi $mulai+0 
						                  while($row =mysqli_fetch_array($hasil)) //JIKA INGIN MENGGUNAKAN PAGGING, ganti ARRAY menjadi ASSOC
						                  {
						                    $id=$row["id_soal"];
						                    $pertanyaan=$row["soal"];
						                    $kunci_jwbn=$row["knc_jwbn"];
						                ?>

						                <form method="post" action="cek_jawaban.php" enctype="multipart/form-data">
						                  <input type="hidden" name="id[]" value=<?php echo $id; ?>>
						                  <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
						                  <table>
						                    <tr>
						                        <td width="30px"><font color="#000000"><?php echo $urut=$urut+1; ?>.</font></td>
						                        <td width="1250px" style="padding: 10px;"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
						                    </tr>
						                    <tr>
						                        <td height="21"><font color="#000000">&nbsp;</font></td>
						                        <td>  
						                          <i><font>Answer : </font></i><input name="jawab[<?php echo $id; ?>]" type="text" style="border: none;" autocomplete="off" placeholder="....."><br><br>
						                        </td>
						                    </tr>
						                    <?php } ?>
						                    <tr>
						                        <td>&nbsp;</td>
						                        <td align="center"><br>
						                          <button id="frmSoal"  type="submit" name="submit" hidden="hidden"></button>
						                          <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary" onclick="return confirm('Are You sure?')">
						                        </td>
						                    </tr>
						                  </table>
						                </form>

						                <!-- <script type="text/javascript">
						                  window.setTimeout(function() {
						                    document.getElementById("submit").click();
						                  }, 12000);
						                </script> -->
						              </table>
						              <!-- AKTIFKAN INI UNTUK MENGGUNAKAN PAGGING -->
						              <!-- <div class="">
						                <?php for ($i=1; $i<=$pages ; $i++){ ?>
						                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
						                <?php } ?>
						              </div> -->
									</div>
								</div>
							  </div>
							</div>
						</div>
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
		<script src="../assets/js/jquery-ui.custom.min.js"></script>
		<script src="../assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="../assets/js/jquery.easypiechart.min.js"></script>
		<script src="../assets/js/jquery.sparkline.index.min.js"></script>
		<script src="../assets/js/jquery.flot.min.js"></script>
		<script src="../assets/js/jquery.flot.pie.min.js"></script>
		<script src="../assets/js/jquery.flot.resize.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
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
