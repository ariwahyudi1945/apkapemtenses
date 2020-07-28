<?php
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';

if(isset($_POST['login']))
{
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
 
// menyeleksi data user dengan username dan password yang sesuai
$login1 = mysqli_query($koneksi,"SELECT * FROM mahasiswa, jurusan WHERE mahasiswa.id_jur=jurusan.id_jur AND username='$username' AND password='$password'");
$login2 = mysqli_query($koneksi,"SELECT * FROM dosen WHERE username='$username' AND password='$password'");
$login3 = mysqli_query($koneksi,"SELECT * FROM super_admin WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
// $cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if(mysqli_num_rows($login1) == 1){
 
	$data = mysqli_fetch_array($login1);

	$_SESSION['iduser'] = $data['id_mhs'];
	$_SESSION['username'] = $username;
	$_SESSION['nama_user'] = $data['nama_mhs'];
	$_SESSION['alamat'] = $data['alamat'];
	$_SESSION['ttl'] = $data['ttl'];
	$_SESSION['id_jur'] = $data['id_jur'];
	$_SESSION['jurusan'] = $data['nama_jur'];
	$_SESSION['jenkel'] = $data['jenkel'];
	$_SESSION['agama'] = $data['agama'];
	$_SESSION['foto_user'] = $data['foto'];
	$_SESSION['status']="login";
	// alihkan ke halaman dashboard
	echo "<script>alert('Login Success!')</script>";
	echo '<script type="text/javascript">window.location="mahasiswa/index.php"</script>';
}else if (mysqli_num_rows($login2) == 1) {

	$data2 = mysqli_fetch_array($login2);

	$_SESSION['iduser'] = $data2['id_dosen'];
	$_SESSION['username'] = $username;
	$_SESSION['nama_user'] = $data2['nama_dosen'];
	$_SESSION['alamat'] = $data2['alamat'];
	$_SESSION['ttl'] = $data2['ttl'];
	$_SESSION['jenkel'] = $data2['jenkel'];
	$_SESSION['agama'] = $data2['agama'];
	$_SESSION['foto_user'] = $data2['foto'];
	$_SESSION['status']="login";
	// alihkan ke halaman dashboard
	echo "<script>alert('Login Success!')</script>";
	echo '<script type="text/javascript">window.location="dosen/index.php"</script>';
}else if (mysqli_num_rows($login3) == 1) {
	
	$data3 = mysqli_fetch_array($login3);

	$_SESSION['iduser'] = $data3['id_sa'];
	$_SESSION['username'] = $username;
	$_SESSION['status']="login";
	// alihkan ke halaman dashboard
	echo "<script>alert('Login Success!')</script>";
	echo '<script type="text/javascript">window.location="admin/index.php"</script>';
}else{
	// alihkan ke halaman login kembali
	echo "<script>alert('Login Filed!')</script>";
	echo '<script type="text/javascript">window.location="login.php"</script>';
}
}
