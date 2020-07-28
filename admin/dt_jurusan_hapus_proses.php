<?php
	include '../koneksi.php';

	$id_jur=$_GET['id_jur'];
	$hapus=mysqli_query($koneksi, "DELETE FROM jurusan WHERE id_jur='$id_jur'")or die(mysqli_error());

	if ($hapus) {
			echo "<script>alert('Data successfully deleted')</script>";
			echo '<script type="text/javascript">window.location="dt_jurusan_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to delete')</script>";
			echo "<script>history.go(-1)</script>";
		}

?>