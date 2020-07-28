<?php
	include('../koneksi.php');

		$id_modul = $_POST['id_modul'];
		$judul = $_POST['judul'];
		$id_dosen = $_POST['id_dosen'];

		$nama_file=$_FILES['file']['name'];
		$ekstensi_diperbolehkan=array('pdf');
		$ekstensi=strtolower(end(explode('.', $_FILES['file']['name'])));
		$ekstensi_ok=in_array($ekstensi, $ekstensi_diperbolehkan);
		$file_tmp=$_FILES['file']['tmp_name'];

		//validasi input type file
		if ($file_tmp=="") {
			mysqli_query($koneksi, "UPDATE modul SET judul='$judul',id_dosen='$id_dosen' WHERE id_modul='$id_modul'") or die(mysqli_error());
			echo "<script>alert('Data successfully edited')</script>";
			echo '<script type="text/javascript">window.location="dt_modul_tampil.php"</script>';
		}else{
			if (!($ekstensi_ok)) {
				echo "<script>alert('Ekstensi file tidak sesuai, masukkan file dengan ekstensi PDF')</script>";
				echo "<script>history.go(-1)</script>";
			}else{
				$data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul='$id_modul'"));
				if ($data['modul']!="") {
					move_uploaded_file($file_tmp, "../modul/".$nama_file);
				mysqli_query($koneksi, "UPDATE modul SET judul='$judul',modul='$nama_file',id_dosen='$id_dosen' WHERE id_modul='$id_modul'") or die(mysqli_error());
					echo "<script>alert('Data successfully edited')</script>";
					echo '<script type="text/javascript">window.location="dt_modul_tampil.php"</script>';
				}else{
					move_uploaded_file($file_tmp, "../modul/".$nama_file);
				mysqli_query($koneksi, "UPDATE modul SET judul='$judul',modul='$nama_file',id_dosen='$id_dosen' WHERE id_modul='$id_modul'") or die(mysqli_error());
					echo "<script>alert('Data successfully edited')</script>";
					echo '<script type="text/javascript">window.location="dt_modul_tampil.php"</script>';
				}
			}
		}
?>