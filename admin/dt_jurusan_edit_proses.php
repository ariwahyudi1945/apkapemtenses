	<?php
		include('../koneksi.php');

		$id_jur = $_POST['id_jur'];
		$nama_jur = $_POST['nama_jur'];

		$edit = mysqli_query($koneksi, "UPDATE jurusan SET nama_jur='$nama_jur' WHERE id_jur='$id_jur'") or die(mysqli_error());

		if ($edit) {
			echo "<script>alert('Data successfully edited')</script>";
			echo '<script type="text/javascript">window.location="dt_jurusan_tampil.php"</script>';
		}
		else{
			echo "<script>alert('Data failed to edit')</script>";
			echo "<script>history.go(-1)</script>";
		}

	?>

	

	