<?php
	include('../koneksi.php');

	if(isset($_POST['tambah'])) {
		$id_dosen = $_POST['id_dosen'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$ttl = $_POST['ttl'];
		$jenkel = $_POST['jenkel'];
		$agama = $_POST['agama'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$nama_file=$_FILES['file']['name'];
		$ekstensi_diperbolehkan=array('img','png','jpg','jpeg','JPG','PNG');
		$ekstensi=strtolower(end(explode('.', $_FILES['file']['name'])));
		$ekstensi_ok=in_array($ekstensi, $ekstensi_diperbolehkan);
		$file_tmp=$_FILES['file']['tmp_name'];

		$sql=mysqli_query($koneksi, "SELECT * FROM dosen");
		$data=mysqli_fetch_array($sql);
		
		if ($id_dosen==$data['id_dosen']) {
			echo "<script>alert('Data sudah ada!!!')</script>";
			echo "<script>history.go(-1)</script>";
		} else {
			//validasi input type file
			if (!($ekstensi_ok)) {
				echo "<script>alert('Ekstensi foto tidak sesuai, masukkan file dengan ekstensi IMG, PNG, JPG, JPEG')</script>";
				echo "<script>history.go(-1)</script>";
			}else{
				move_uploaded_file($file_tmp, '../img/user/'.$nama_file);
				$tambah = mysqli_query($koneksi, "INSERT INTO dosen VALUES ('','$nama','$alamat','$ttl','$jenkel','$agama','$nama_file','$username','$password')") or die(mysqli_error());
				if ($tambah) {
					echo "<script>alert('Data successfully added')</script>";
					echo '<script type="text/javascript">window.location="dt_dosen_tampil.php"</script>';
				}
			}
		}
	}
?>