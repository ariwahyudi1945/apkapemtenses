<?php 
	include '../koneksi.php';

	$soal=$_POST['soal'];
	$knc_jwbn=$_POST['knc_jwbn'];
	$id_dosen=$_POST['id_dosen'];

	$query=mysqli_query($koneksi, "INSERT INTO soal VALUES ('','$soal','$knc_jwbn','Y','$id_dosen')") or die(mysqli_error());
	if ($query) {
		echo "<script>alert('Data successfully added')</script>";
		echo '<script type="text/javascript">window.location="dt_soal_tampil.php"</script>';
	} 
	else{
		echo "<script>alert('Data failed to add')</script>";
		echo "<script>history.go(-1)</script>";
	}
 ?>