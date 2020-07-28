<?php
	include '../koneksi.php';

	$id_modul=$_GET['id_modul'];
	$hapus=mysqli_query($koneksi, "DELETE FROM modul WHERE id_modul='$id_modul'")or die(mysqli_error());

	if ($hapus) {
			echo "<script>alert('Data successfully deleted')</script>";
			echo '<script type="text/javascript">window.location="dt_modul_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to delete')</script>";
			echo "<script>history.go(-1)</script>";
		}

?>