<?php 
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=daftar-nilai.xls");
 ?>

 <div class="table-responsive">
	<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jurusan</th>
          <th>Tanggal Latihan</th>
          <th>Jawaban Benar</th>
          <th>Jawaban Salah</th>
          <th>Tidak Dijawab</th>
          <th>Nilai</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            include '../koneksi.php';
            include '../format_tanggal.php';
            $tampil=mysqli_query($koneksi, "SELECT * FROM nilai, mahasiswa, jurusan WHERE nilai.id_mhs=mahasiswa.id_mhs AND mahasiswa.id_jur=jurusan.id_jur ORDER BY id_nilai DESC") or die(mysqli_error());

            $no=0;
            while ($data=mysqli_fetch_array($tampil)) {
                $no++;
                $id_nilai=$data['id_nilai'];
                ?>
            <tr>
                <td align="center"><?= $no; ?></td>
                <td align="center"><?= $data['username']; ?></td>
                <td align="center"><?= $data['nama_mhs']; ?></td>
                <td align="center"><?= $data['nama_jur']; ?></td>
                <td align="center"><?= format_indo($data['tgl']); ?></td>
                <td align="center"><?= $data['benar']; ?></td>
                <td align="center"><?= $data['salah']; ?></td>
                <td align="center"><?= $data['kosong']; ?></td>
                <td align="center"><?= $data['nilai']; ?></td>
                <td align="center"><?= $data['ket']; ?></td>
            </tr>
          <?php } ?>
      </tbody>
    </table>
</div>