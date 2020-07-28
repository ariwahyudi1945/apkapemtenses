<?php
	include('../koneksi.php');

	if(isset($_POST['tambah'])) {
		$judul = $_POST['judul'];
		$id_dosen = $_POST['id_dosen'];

		$nama_file=$_FILES['file']['name'];
		$ekstensi_diperbolehkan=array('pdf');
		$ekstensi=strtolower(end(explode('.', $_FILES['file']['name'])));
		$ekstensi_ok=in_array($ekstensi, $ekstensi_diperbolehkan);
		$file_tmp=$_FILES['file']['tmp_name'];

		//validasi input type file
		if (!($ekstensi_ok)) {
			echo "<script>alert('Ekstensi file tidak sesuai, masukkan file dengan ekstensi PDF')</script>";
			echo "<script>history.go(-1)</script>";
		}else{
			move_uploaded_file($file_tmp, '../modul/'.$nama_file);
			$tambah = mysqli_query($koneksi, "INSERT INTO modul VALUES ('','$judul','$nama_file','$id_dosen')") or die(mysqli_error());
			if ($tambah) {
				echo "<script>alert('Data successfully added')</script>";
				echo '<script type="text/javascript">window.location="dt_modul_tampil.php"</script>';
			}
		}
	}
?>