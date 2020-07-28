<?php
	include '../koneksi.php';

	$id_mhs=$_GET['id_mhs'];
	$hapus=mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mhs='$id_mhs'")or die(mysqli_error());

	if ($hapus) {
		echo "<script>alert('Data successfully deleted')</script>";
		echo '<script type="text/javascript">window.location="dt_mhs_tampil.php"</script>';
	}else{
		echo "<script>alert('Data failed to delete')</script>";
		echo "<script>history.go(-1)</script>";
	}

?>