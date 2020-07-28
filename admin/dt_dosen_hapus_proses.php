<?php
	include '../koneksi.php';

	$id_dosen=$_GET['id_dosen'];
	$hapus=mysqli_query($koneksi, "DELETE FROM dosen WHERE id_dosen='$id_dosen'")or die(mysqli_error());

	if ($hapus) {
		echo "<script>alert('Data successfully deleted')</script>";
		echo '<script type="text/javascript">window.location="dt_dosen_tampil.php"</script>';
	}else{
		echo "<script>alert('Data failed to delete')</script>";
		echo "<script>history.go(-1)</script>";
	}

?>