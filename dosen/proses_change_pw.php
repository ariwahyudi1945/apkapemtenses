<?php 
	// $pengacak = "hduwAHDU28328heUUH7283xx";

	include "../koneksi.php";

	$id_dosen				= $_POST['id_dosen'];
	$password_lama			= md5($_POST['password_lama']);
	$password_baru			= $_POST['password_baru'];
	$konfirmasi_password	= $_POST['konfirmasi_password'];

	$hasil = mysqli_query($koneksi, "SELECT * FROM dosen WHERE id_dosen='$id_dosen'");
	$data=mysqli_fetch_array($hasil);

	if ($data['password']==$password_lama) {
		if ($password_baru == $konfirmasi_password) {
			$password_baruenkrip = md5($password_baru);

			$query=mysqli_query($koneksi, "UPDATE dosen SET password='$password_baruenkrip' WHERE id_dosen='$id_dosen'");
			if ($query) {
				echo "<script>alert('Password successfully edited')</script>";
				echo '<script type="text/javascript">window.location="index.php"</script>';
			}
		}else{
			echo "<script>alert('Confirm Password Incorrect')</script>";
			echo "<script>history.go(-1)</script>";
		}
	}else{
		echo "<script>alert('Old Password Incorrect')</script>";
		echo "<script>history.go(-1)</script>";
	}
 ?>