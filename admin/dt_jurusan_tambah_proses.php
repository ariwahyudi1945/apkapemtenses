<?php 
	include '../koneksi.php';

	$jur=$_POST['jur'];

	$query=mysqli_query($koneksi, "INSERT INTO jurusan VALUES ('','$jur')") or die(mysqli_error());
	if ($query) {
		echo "<script>alert('Data successfully added')</script>";
		echo '<script type="text/javascript">window.location="dt_jurusan_tampil.php"</script>';
	} 
	else{
		echo "<script>alert('Data failed to add')</script>";
		echo "<script>history.go(-1)</script>";
	}
 ?>