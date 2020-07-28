<?php
	include '../koneksi.php';

	$hapus=mysqli_query($koneksi, "DELETE FROM nilai")or die(mysqli_error());

	if ($hapus) {
			echo "<script>alert('Data successfully deleted')</script>";
			echo '<script type="text/javascript">window.location="dt_nilai_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to delete')</script>";
			echo "<script>history.go(-1)</script>";
		}

?>