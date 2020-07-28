<?php
		include('../koneksi.php');

		$id_nilai = $_GET['id_nilai'];

		$simpan = mysqli_query($koneksi, "UPDATE nilai SET status='0' WHERE id_nilai='$id_nilai'") or die(mysqli_error());

		if ($simpan) {
			echo '<script type="text/javascript">window.location="dt_nilai_tampil.php"</script>';
		}
	?>