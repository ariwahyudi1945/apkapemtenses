<?php

   session_start();

   include ("koneksi.php");

   // membaca id file dari link
   $id = $_GET['id'];

   // membaca informasi file dari tabel berdasarkan id nya
   $query  = mysqli_query($koneksi, "SELECT * FROM modul WHERE id_modul = '$id'");
   $data = mysqli_fetch_array($query);

   // header yang menunjukkan nama file yang akan didownload
   header("Content-Disposition: attachment; filename=".$data['modul']);

   // proses membaca isi file yang akan didownload dari folder 'data'
   $fp  = fopen("modul/".$data['modul'], 'r');
   $content = fread($fp, filesize('modul/'.$data['modul']));
   fclose($fp);

   // menampilkan isi file yang akan didownload
   echo $content;
   exit();

?>
