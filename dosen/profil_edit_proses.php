<?php
	include('../koneksi.php');

		$id_dosen = $_POST['id'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$ttl = $_POST['ttl'];
		$jenkel = $_POST['jenkel'];
		$agama = $_POST['agama'];

		$nama_file=$_FILES['file']['name'];
		$ekstensi_diperbolehkan=array('img','png','jpg','jpeg','JPG','PNG');
		$ekstensi=strtolower(end(explode('.', $_FILES['file']['name'])));
		$ekstensi_ok=in_array($ekstensi, $ekstensi_diperbolehkan);
		$file_tmp=$_FILES['file']['tmp_name'];

		//validasi input type file
		if ($file_tmp=="") {
			mysqli_query($koneksi, "UPDATE dosen SET nama_dosen='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama' WHERE id_dosen='$id_dosen'") or die(mysqli_error());
			echo "<script>alert('Data successfully edited')</script>";
			echo '<script type="text/javascript">window.location="profil_tampil.php"</script>';
		}else{
			if (!($ekstensi_ok)) {
				echo "<script>alert('Ekstensi file tidak sesuai, masukkan file dengan ekstensi IMG, PNG, JPG, JPEG')</script>";
				echo "<script>history.go(-1)</script>";
			}else{
				$data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen='$id_dosen'"));
				if ($data['foto']!="") {
					move_uploaded_file($file_tmp, "../img/user/".$nama_file);
				mysqli_query($koneksi, "UPDATE dosen SET nama_dosen='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama',foto='$nama_file' WHERE id_dosen='$id_dosen'") or die(mysqli_error());
					echo "<script>alert('Data successfully edited')</script>";
					echo '<script type="text/javascript">window.location="profil_tampil.php"</script>';
				}else{
					move_uploaded_file($file_tmp, "../img/user/".$nama_file);
				mysqli_query($koneksi, "UPDATE dosen SET nama_dosen='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama',foto='$nama_file' WHERE id_dosen='$id_dosen'") or die(mysqli_error());
					echo "<script>alert('Data successfully edited')</script>";
					echo '<script type="text/javascript">window.location="profil_tampil.php"</script>';
				}
			}
		}
?>