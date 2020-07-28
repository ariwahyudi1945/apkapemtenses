<?php
	include '../koneksi.php';

	$id_soal=$_GET['id_soal'];
	$hapus=mysqli_query($koneksi, "DELETE FROM soal WHERE id_soal='$id_soal'")or die(mysqli_error());

	if ($hapus) {
			echo "<script>alert('Data successfully deleted')</script>";
			echo '<script type="text/javascript">window.location="dt_soal_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to delete')</script>";
			echo "<script>history.go(-1)</script>";
		}

?>