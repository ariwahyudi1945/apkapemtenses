<div class="table-responsive">
	<table width="100%" border="0">
    <?php 
      include 'koneksi.php';

      // Cek apakah terdapat data page pada URL
		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 1; // Jumlah data per halamannya
		$no = (($page - 1) * $limit) + 1; // Untuk setting awal nomor pada halaman yang aktif

		// Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database
		$limit_start = ($page - 1) * $limit;

		$sql = mysqli_query($koneksi, "SELECT * FROM soal LIMIT ".$limit_start.",".$limit);
		$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM soal");
		$get_jumlah = mysqli_fetch_array($sql2);
		$jumlah=mysqli_num_rows($sql);
		$urut=0;

      // $hasil=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT $mulai, $halaman"); //QUERY MENGGUNAKAN PAGGING
      // $hasil=mysqli_query($connect, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT 10");
      // $jumlah=mysqli_num_rows($hasil);
      // $urut=0; //jika ingin menggunakan pagging maka rubah menjadi $mulai+0 
      while($row =mysqli_fetch_array($sql)) //JIKA INGIN MENGGUNAKAN PAGGING, ganti ARRAY menjadi ASSOC
      {
        $id=$row["id_soal"];
        $pertanyaan=$row["soal"];
        $kunci_jwbn=$row["knc_jwbn"];
    ?>

    <form method="post" action="cek_jawaban.php" enctype="multipart/form-data">
      <input type="hidden" name="id[]" value=<?php echo $id; ?>>
      <input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
      <table>
        <tr>
            <td width="30px"><font color="#000000"><?php echo $urut=$urut+1; ?>.</font></td>
            <td width="1250px" style="padding: 10px;"><font color="#000000"><?php echo "$pertanyaan"; ?></font></td>
        </tr>
        <tr>
            <td height="21"><font color="#000000">&nbsp;</font></td>
            <td>  
              <i><font>Answer : </font></i><input name="jawab[<?php echo $id; ?>]" type="text" style="border: none;" autocomplete="off" placeholder="....."><br><br>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td>&nbsp;</td>
            <td align="center"><br>
              <button id="frmSoal"  type="submit" name="submit" hidden="hidden"></button>
              <input type="submit" name="submit" value="SEND" class="btn btn-primary" onclick="return confirm('Are You sure?')">
            </td>
        </tr>
      </table>
    </form>

    <!-- <script type="text/javascript">
      window.setTimeout(function() {
        document.getElementById("submit").click();
      }, 12000);
    </script> -->
  </table>
</div>

<?php
$count = mysqli_num_rows($sql);

if($count > 0){ // Jika datanya ada, tampilkan paginationnya
    ?>
    <!--
    -- Buat Paginationnya
    -- Dengan bootstrap, kita jadi dimudahkan untuk membuat tombol-tombol pagination dengan design yang bagus tentunya
    -->
    <ul class="pagination">
    	<!-- LINK FIRST AND PREV -->
    	<?php
    	if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
    	?>
    		<li class="disabled"><a href="#">First</a></li>
    		<li class="disabled"><a href="#">&laquo;</a></li>
    	<?php
    	}else{ // Jika page bukan page ke 1
    		$link_prev = ($page > 1)? $page - 1 : 1;
    	?>
    		<li><a href="javascript:void(0);" onclick="searchWithPagination(1, false)">First</a></li>
    		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_prev; ?>, false)">&laquo;</a></li>
    	<?php
    	}
    	?>

    	<!-- LINK NUMBER -->
    	<?php
    	$jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
    	$jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
    	$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
    	$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number

    	for($i = $start_number; $i <= $end_number; $i++){
    		$link_active = ($page == $i)? ' class="active"' : '';
    	?>
    		<li<?php echo $link_active; ?>><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $i; ?>, false)"><?php echo $i; ?></a></li>
    	<?php
    	}
    	?>

    	<!-- LINK NEXT AND LAST -->
    	<?php
    	// Jika page sama dengan jumlah page, maka disable link NEXT nya
    	// Artinya page tersebut adalah page terakhir
    	if($page == $jumlah_page){ // Jika page terakhir
    	?>
    		<li class="disabled"><a href="#">&raquo;</a></li>
    		<li class="disabled"><a href="#">Last</a></li>
    	<?php
    	}else{ // Jika Bukan page terakhir
    		$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
    	?>
    		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_next; ?>, false)">&raquo;</a></li>
    		<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $jumlah_page; ?>, false)">Last</a></li>
    	<?php
    	}
    	?>
    </ul>
    <?php
}
?>
