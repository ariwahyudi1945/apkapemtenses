<?php
	include '../koneksi.php';

	$id_nilai=$_GET['id_nilai'];
	$hapus=mysqli_query($koneksi, "DELETE FROM nilai WHERE id_nilai='$id_nilai'")or die(mysqli_error());

	if ($hapus) {
			echo "<script>alert('Data successfully deleted')</script>";
			echo '<script type="text/javascript">window.location="dt_nilai_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to delete')</script>";
			echo "<script>history.go(-1)</script>";
		}

?>