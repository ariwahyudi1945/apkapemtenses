		<?php
		include('../koneksi.php');

		$id_mhs = $_POST['id_mhs'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$ttl = $_POST['ttl'];
		$jenkel = $_POST['jenkel'];
		$agama = $_POST['agama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$id_jur = $_POST['id_jur'];

		$nama_file = $_FILES['file']['name'];
		$lokasi_file = $_FILES['file']['tmp_name'];
		$tipe_file = $_FILES['file']['type'];

		if ($lokasi_file=="") {
			mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mhs='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama',username='$username',password='$password',id_jur='$id_jur' WHERE id_mhs='$id_mhs'") or die(mysqli_error());
		}
		else{
			$data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'"));
			if ($data['foto'] !="")
			{
				move_uploaded_file($lokasi_file, "../img/user/".$nama_file);
			mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mhs='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama',foto='$nama_file',username='$username',password='$password',id_jur='$id_jur' WHERE id_mhs='$id_mhs'") or die(mysqli_error());
			}
			else
			{
				move_uploaded_file($lokasi_file, "../img/user/".$nama_file);
			mysqli_query($koneksi, "UPDATE mahasiswa SET nama_mhs='$nama',alamat='$alamat',ttl='$ttl',jenkel='$jenkel',agama='$agama',foto='$nama_file',username='$username',password='$password',id_jur='$id_jur' WHERE id_mhs='$id_mhs'") or die(mysqli_error());
			}
		}
		echo "<script>alert('Data successfully edited')</script>";
		echo '<script type="text/javascript">window.location="dt_mhs_tampil.php"</script>';
		//header("location: berita_tampil.php");
	?>