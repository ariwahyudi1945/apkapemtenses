<?php 
	include '../koneksi.php';

	$id_soal=$_POST['id_soal'];
	$soal=$_POST['soal'];
	$knc_jwbn=$_POST['knc_jwbn'];
	$id_dosen=$_POST['id_dosen'];

	$sql=mysqli_query($koneksi, "SELECT * FROM soal");
	$data=mysqli_fetch_array($sql);

	if ($id_soal==$data['id_soal']) {
		echo "<script>alert('Data sudah ada')</script>";
		echo "<script>history.go(-1)</script>";
	}
	else{
		$query=mysqli_query($koneksi, "INSERT INTO soal VALUES ('','$soal','$knc_jwbn','Y','$id_dosen')") or die(mysqli_error());
		if ($query) {
			echo "<script>alert('Data successfully added')</script>";
			echo '<script type="text/javascript">window.location="dt_soal_tampil.php"</script>';
		} 
		else{
			echo "<script>alert('Data failed to add')</script>";
			echo "<script>history.go(-1)</script>";
		}
	}
 ?>