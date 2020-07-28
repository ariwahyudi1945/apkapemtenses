<!-- JIKA INGIN MENGGUNAKAN PAGGING -->
				              <?php 
				                include 'koneksi.php';
				                $page = (isset($_POST["page"]))? $_POST["page"] : 1;
				                $limit=5;
				                $limit_start = ($page-1) * $limit;
				                $no= $limit_start + 1;

				                $query = mysqli_query($koneksi, "SELECT * FROM soal LIMIT $limit_start, $limit");
				                $total = mysqli_num_rows($result);
				                $pages = ceil($total/$halaman);
				              ?>
				              <table width="100%" border="0">
				                <?php 
				                  include 'koneksi.php';
				                  $hasil=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT $mulai, $halaman"); //QUERY MENGGUNAKAN PAGGING
				                  // $hasil=mysqli_query($koneksi, "SELECT * FROM soal WHERE status_aktif='Y' ORDER BY RAND () LIMIT 10");
				                  $jumlah=mysqli_num_rows($hasil);
				                  $urut=$mulai+0; //jika ingin menggunakan pagging maka rubah menjadi $mulai+0 
				                  while($row =mysqli_fetch_array($hasil)) //JIKA INGIN MENGGUNAKAN PAGGING, ganti ARRAY menjadi ASSOC
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
				              <!-- AKTIFKAN INI UNTUK MENGGUNAKAN PAGGING -->
				              <div class="">
				                <?php for ($i=1; $i<=$pages ; $i++){ ?>
				                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
				                <?php } ?>
				              </div>