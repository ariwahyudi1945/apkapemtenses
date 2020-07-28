	<?php
		include('../koneksi.php');

		$id_soal = $_POST['id_soal'];
		$soal = $_POST['soal'];
		$kunci_jawaban = $_POST['knc_jwbn'];
		$id_dosen = $_POST['id_dosen'];

		$edit = mysqli_query($koneksi, "UPDATE soal SET soal='$soal', knc_jwbn='$kunci_jawaban', id_dosen='$id_dosen' WHERE id_soal='$id_soal'") or die(mysqli_error());

		if ($edit) {
			echo "<script>alert('Data successfully edited')</script>";
			echo '<script type="text/javascript">window.location="dt_soal_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to edit')</script>";
			echo "<script>history.go(-1)</script>";
		}

	?>

	

	