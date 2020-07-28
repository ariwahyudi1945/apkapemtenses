	<?php
		include('../koneksi.php');

		$id_peraturan = $_POST['id_peraturan'];
		$waktu_pengerjaan = $_POST['waktu_pengerjaan'];
		$jml_soal = $_POST['jml_soal'];
		$nilai_min = $_POST['nilai_min'];
		$peraturan = $_POST['peraturan'];

		$edit = mysqli_query($koneksi, "UPDATE peraturan SET waktu_pengerjaan='$waktu_pengerjaan', jml_soal='$jml_soal', nilai_min='$nilai_min', peraturan='$peraturan' WHERE id_peraturan='$id_peraturan'") or die(mysqli_error());

		if ($edit) {
			echo "<script>alert('Data successfully edited')</script>";
			echo '<script type="text/javascript">window.location="dt_peraturan_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to edit')</script>";
			echo "<script>history.go(-1)</script>";
		}

	?>

	

	