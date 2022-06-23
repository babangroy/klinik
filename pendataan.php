<?php
include 'fungsi.php';

$datapasien = mysqli_query($koneksi, "SELECT * FROM tb_pendataan ORDER BY NoRM DESC") or die(mysqli_error($koneksi));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" />
    <title>Beranda | Klinik</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar shadow fixed-top navbar-expand-lg navbar-dark fw-semibold" style="background-color: #00A390">
      <div class="container fw-semibold">
        <a class="navbar-brand fs-3" href="#">
          <i class="bi bi-hospital"></i>
          Klinik
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
    <!-- Akhir Navbar -->

   
    <div class="col text-center container mt-5 pt-5">
      <h1 class="fw-semibold"><i class="bi bi-person-plus me-1"></i>Pendataan Pasien</h1>
      <hr />
    </div>

    <!-- Awal Form Pendaftaran -->
    <div class="container">
      <div class="row">
        <div class="col-4 me-auto">
          <h3 class="text-center mt-3"><i class="bi bi-box-arrow-right me-2"></i>Registrasi Pasien</h3>
          <hr />
          <form action="simpanpendataan.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Rekam Medis</label>
              <?php
                $data = mysqli_query($koneksi, "SELECT NoRM FROM tb_pendataan") or die(mysqli_error($koneksi));
                while($data_rm = mysqli_fetch_array($data)){
                  $norm = max ($data_rm)+1;
                }
              ?>
              <input disabled type="text" class="form-control" id="exampleInputEmail1" name="noRM" value="<?php echo $norm; ?>" />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail2" class="form-label">Nama Pasien</label>
              <input type="text" class="form-control" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" placeholder="Masukkan Nama Pasien" id="exampleInputEmail2" name="namapasien" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="Pilih1" class="form-label">Jenis Kelamin</label>
              <select class="form-select" aria-label="Default select example" id="Pilih1" name="JenisKelamin" autocomplete="off" required>
                <option disabled selected value>----------------- Pilih Jenis Kelamin -----------------</option>
                <option value="LAKI - LAKI">LAKI - LAKI</option>
                <option value="PEREMPUAN">PEREMPUAN</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tempatlahir" class="form-label">Tempat Lahir</label>
              <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="tempatlahir" name="tmptlahir" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="tglhr" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" placeholder="Masukkan Tempat Lahir" id="tglhr" name="tglhr" autocomplete="off" required />
            </div>
           
            <div class="mb-3">
              <label for="sttsnikah" class="form-label">Status Menikah</label>
              <select class="form-select" aria-label="Default select example" id="sttsnikah" name="statusnikah" autocomplete="off" required>
                <option disabled selected value>-------------- Pilih Status Menikah --------------</option>
                <option value="MENIKAH">MENIKAH</option>
                <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                <option value="JANDA">JANDA</option>
                <option value="DUDA">DUDA</option>
                <option value="DIBAWAH UMUR">DIBAWAH UMUR</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="sukui" class="form-label">Suku</label>
              <input type="text" class="form-control" placeholder="Masukkan Suku" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="sukui" name="suku" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="agamai" class="form-label">Agama</label>
              <select class="form-select" aria-label="Default select example" id="agamai" name="agama" autocomplete="off" required>
                <option disabled selected value>------------------ Pilih Agama ------------------</option>
                <option value="ISLAM">ISLAM</option>
                <option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
                <option value="KATOLIK">KATOLIK</option>
                <option value="HINDU">HINDU</option>
                <option value="BUDHA">BUDHA</option>
                <option value="KONGHUCU">KONGHUCU</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="bangsai" class="form-label">Kebangsaan</label>
              <select class="form-select" aria-label="Default select example" id="bangsai" name="kebangsaan" autocomplete="off" required>
                <option disabled selected value>------------------ Pilih Kebangsaan ------------------</option>
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="goldarah" class="form-label">Golongan Darah</label>
              <input type="Text" class="form-control" placeholder="Masukkan Golongan Darah" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="goldarah" name="golongandarah" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="alamati" class="form-label">Alamat</label>
              <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="alamati" style="height: 60px"></textarea>
            </div>
            <div class="mb-3">
              <label for="propinsi" class="form-label">Provinsi</label>
              <select class="form-select" aria-label="Default select example" id="propinsi" name="propinsi" autocomplete="off" required>
                <option disabled selected value="">------------------ Pilih provinsi ------------------</option>
                <!-- Awal Pilih Profinsi -->
                <?php
                $sql_prov = mysqli_query($koneksi, "SELECT * FROM provinces ORDER BY prov_name ASC") or die(mysqli_error($koneksi));
                while($data_prov = mysqli_fetch_array($sql_prov)){
                ?>
                  <option value="<?php echo $data_prov['prov_name'];?>"><?php echo $data_prov['prov_name'];?></option>
                <?php
                }
                ?>
                <!-- Akhir Pilih Profinsi -->
              </select>
            </div>
            <div class="mb-3">
              <label for="kota" class="form-label">Kab / Kota</label>
              <select class="form-select" aria-label="Default select example" id="kota" name="kota" autocomplete="off" required>
                <option disabled selected value="">------------------ Pilih KAB / KOTA ------------------</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kecamatan" class="form-label">Kecamatan</label>
              <select class="form-select" aria-label="Default select example" id="kecamatan" name="kecamatan" autocomplete="off" required>
                <option disabled selected value="">------------------ Pilih Kecamatan ------------------</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kelurahan" class="form-label">Kelurahan</label>
              <select class="form-select" aria-label="Default select example" id="kelurahan" name="kelurahan" autocomplete="off" required>
                <option disabled selected value="">------------------ Pilih Kelurahan ------------------</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="notel" class="form-label">No Telephone</label>
              <input type="number" class="form-control" placeholder="MASUKKAN NO TELEPON" id="notel" name="notel" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="pekerjaan" class="form-label">Pekerjaan</label>
              <select class="form-select" aria-label="Default select example" id="pekerjaan" name="pekerjaan" autocomplete="off" required>
                <option disabled selected value>------------------ Pilih Pekerjaan ------------------</option>
                <option value="PEGAWAI NEGERI">PEGAWAI NEGERI</option>
                <option value="PEGAWAI SWASTA">PEGAWAI SWASTA</option>
                <option value="WIRA SWASTA">WIRA SWASTA</option>
                <option value="WIRA USAHA">WIRA USAHA</option>
                <option value="TNI / POLRI">TNI / POLRI</option>
                <option value="PELAJAR">PELAJAR</option>
                <option value="TIDAK BEKERJA">TIDAK BEKERJA</option>
                <option value="PENSIUNAN">PENSIUNAN</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="pendidikan" class="form-label">Pendidikan</label>
              <select class="form-select" aria-label="Default select example" id="pendidikan" name="pendidikan" autocomplete="off" required>
                <option disabled selected value>------------------ Pilih Pendidikan ------------------</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="DIPLOMA">DIPLOMA</option>
                <option value="SARJANA">SARJANA</option>
                <option value="MAGISTER">MAGISTER</option>
                <option value="NON PENDIDIKAN">NON PENDIDIKAN</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success btn-lg me-5 ms-5" style="width: 130px; font-weight:600;" id="simpan" name="simpan"><i class="bi bi-journal-check me-1"></i>Simpan</button>
            <a class="btn text-white btn-lg ms-2" href="" style="width: 130px; font-weight:600; background-color: #d90429;" role="button"><i class="bi bi-x-square me-1"></i>Batal</a>
          </form>
        </div>
        <!-- Akhir Form Pendaftaran -->

        <!-- Awal Form Pencarian Pasien -->
        <div class="col-7 ms-auto">
          <h3 class="mt-3 text-center"><i class="bi bi-search me-1"></i>Cari Data Pasien</h3>
          <hr>   
      <div class="row">
        <div class="col-6">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="Crirm" class="form-label">Berdasarkan No RM / Nama Pasien</label>
              <input type="text" class="form-control" placeholder="Masukkan No RM / Nama Pasien" style="text-transform:uppercase" id="Crirm" name="Crirm" autocomplete="off"/>
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Berdasarkan Tanggal</label>
              <input type="date" class="form-control" placeholder="Masukkan Tanggal" id="tanggal"  name="tanggal" autocomplete="off"/>
            </div>
          </form>
        </div>
      </div>
      <!-- Akhir Form Pencarian Pasien -->

      <!-- Awal Tabel Data Pasien -->
      <h3 class="text-center mt-3"><i class="bi bi-clipboard2-data me-2"></i>Tampilan Data Pasien</h3>
      <hr>
          <div class="table-warper" id="tabeldata">
            <table class="table table-bordered table-hover table-responsive table-striped">
              <thead class="text-white text-center" style="background-color: #00A390;  position: sticky; top: 0px">
                <tr>
                    <th>Aksi</th>
                    <th>No Rekam Medis</th>
                    <th>Tanggal Registrasi</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Status Pernikahan</th>
                    <th>Suku</th>
                    <th>Agama</th>
                    <th>Kebangsaan</th>
                    <th>Gol Darah</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Pekerjaan</th>
                    <th>Pendidikan</th>
                </tr>
              </thead>
              <tbody class="text-center">
                  <?php
                  foreach ($datapasien as $row) :
                    ?>
                <tr>
                  <td>
                    <a class="btn btn-sm text-white" data-bs-target="#modaldaftar<?php echo $row['NoRM'];?>" data-bs-toggle="modal" style="font-weight: 700; background-color: #007AB8" id="daftarberobat"><i class="bi bi-upload"></i>&nbsp;Daftar</a> |
                    <a href="editpasien.php?NoRM=<?= $row['NoRM']; ?>" class="btn btn-sm btn-warning" style="font-weight: 700;"><i class="bi bi-pencil-square"></i>&nbsp;Ubah</a> |
                    <a class="btn btn-sm text-white" data-bs-target="#modalhapus<?php echo $row['NoRM'];?>" data-bs-toggle="modal" style="font-weight: 700; background-color: #d90429" id="konhapus"><i class="bi bi-trash-fill"></i>&nbsp;Hapus</a>
                  </td>
                  <td><?= $row['NoRM'] ?></td>
                  <td><?= $row['TanggalRegistrasi'] ?></td>
                  <td><?= $row['NamaPasien'] ?></td>
                  <td><?= $row['JenisKelamin'] ?></td>
                  <td><?= $row['TempatLahir'] ?></td>
                  <td><?= $row['TanggalLahir'] ?></td>
                  <td><?= $row['Status'] ?></td>
                  <td><?= $row['Suku'] ?></td>
                  <td><?= $row['Agama'] ?></td>
                  <td><?= $row['Kebangsaan'] ?></td>
                  <td><?= $row['GolonganDarah'] ?></td>
                  <td class="text-start"><?= $row['Alamat'] ?></td>
                  <td><?= $row['NoTelp'] ?></td>
                  <td><?= $row['Pekerjaan'] ?></td>
                  <td><?= $row['Pendidikan'] ?></td>
                </tr>

                <!-- Modal Hapus -->
                  <div class="modal fade" id="modalhapus<?php echo $row['NoRM'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="modalhapus"><i class="bi bi-exclamation-triangle me-1"></i>Konfirmasi Hapus Data</h4>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Yakin ingin hapus data pasien dengan nama <?php echo $row['NamaPasien']; ?>?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn  text-white" style="font-weight: 600; background-color: #d90429; width: 90px;" data-bs-dismiss="modal"><i class="bi bi-x-octagon me-1"></i>Tidak</button>
                          <a href="hapus.php?NoRM=<?= $row['NoRM']; ?>" class="btn btn-success" style="font-weight: 600; width: 90px;" name="hapus"><i class="bi bi-check-square"></i>&nbsp;Iya</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Akhir Modal Hapus -->

                  <!-- Modal Daftar Pasien -->
                  <div class="modal fade" id="modaldaftar<?php echo $row['NoRM'];?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header text-white" style="background-color: #00A390">
                          <h3 class="modal-title" id="modaldaftar"><i class="bi bi-box-arrow-in-right me-1"></i>Daftar Berobat</h3>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="modal-body text-start">
                            <form action="simpandaftarberobat.php" method="post" enctype="multipart/form-data">
                              <div class="mb-3">
                                <label for="normpasien" class="form-label">No RM</label>
                                <input type="text" readonly class="form-control" value="<?php echo $row['NoRM'];?>" placeholder="Masukkan NO RM Pasien" id="exampleInputEmail2" name="normpass" autocomplete="off" required />
                              </div>
                              <div class="mb-3">
                                <label for="namapasien" class="form-label">Nama Pasien</label>
                                <input type="text" readonly class="form-control" value="<?php echo $row['NamaPasien'];?>" placeholder="Masukkan Nama Pasien" id="exampleInputEmail2" name="namapasienpass" autocomplete="off" required />
                              </div>
                              <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <select class="form-select" aria-label="Default select example" id="tujuan" name="tujuan" autocomplete="off" required>
                                  <option disabled selected value>------------------------- Pilih Tujuan -------------------------</option>
                                  <option value="BEROBAT">BEROBAT</option>
                                  <option value="TIDAK BEROBAT">TIDAK BEROBAT</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="statuspeserta" class="form-label">Status Peserta</label>
                                <select class="form-select" aria-label="Default select example" id="statuspeserta" name="statuspeserta" autocomplete="off" required>
                                  <option disabled selected value>--------------------- Pilih Status Peserta ---------------------</option>
                                  <option value="UMUM">UMUM</option>
                                  <option value="BPJS">BPJS</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="keluhan" class="form-label">Keluhan</label>
                                <textarea name="keluhan" class="form-control" placeholder="Masukkan Keluhan Pasien" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="alamati" style="height: 60px" autocomplete="off" required></textarea>
                              </div>
                              <label for="beratbadan" class="form-label">Berat Badan</label>
                              <div class="input-group flex-nowrap mb-3">
                                <input type="number" class="form-control" name="beratbadan" placeholder="Masukkan Berat Badan Pasien" aria-describedby="addon-wrapping" autocomplete="off" required>
                                <span class="input-group-text" id="addon-wrapping">Kg</span>
                              </div>
                              <div class="mb-3">
                                <label for="instalasi" class="form-label">Instalasi Tujuan</label>
                                <select class="form-select" aria-label="Default select example" id="instalasitujuan" name="instalasitujuan" autocomplete="off" required>
                                  <option disabled selected value="">--------------------- Pilih Instalasi Tujuan ---------------------</option>
                                  <option value="POLI OBGYN">POLI OBGYN</option>
                                  <option value="POLI ANAK">POLI ANAK</option>
                                </select>
                              </div>
                              <div class="mb-3">
                                <label for="dokterpoli" class="form-label">Dokter Poli</label>
                                <select class="form-select" aria-label="Default select example" id="dokterpoli" name="dokterpoli" autocomplete="off" >
                                  <option disabled selected value="">--------------------- Pilih Dokter Poli ---------------------</option>
                                </select>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <a class="btn text-white ms-2" href="" style="width: 100px; font-weight:600; background-color: #d90429;" role="button"><i class="bi bi-x-square me-1"></i>Batal</a>
                            <button type="submit" class="btn text-white" name="simpandaftar" style="width:100px; font-weight: 700; background-color: #007AB8;"><i class="bi bi-upload me-1"></i>Daftar</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Akhir Modal Daftar Pasien -->
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Tabel Data Pasien -->

    
   

    <!-- JS -->
    <script src="js/bootstrap.bundle.js"></script>

    <!----------------------- AJAX WILAYAH-------------------------  -->
        <script src="jquery.js"></script>
        <script type="text/javascript">
          var htmlobjek;
          $(document).ready(function(){
          //apabila terjadi event onchange terhadap object <select id=propinsi>
          $("#propinsi").change(function(){
          var propinsi = $("#propinsi").val();
          $.ajax({
          url: "ambilkota.php",
          data: "propinsi="+propinsi,
          cache: false,
          success: function(msg){
          //jika data sukses diambil dari server kita tampilkan
          //di <select id=kota>
          $("#kota").html(msg);
          }
          });
          });

          $("#kota").change(function(){
          var kota = $("#kota").val();
          $.ajax({
          url: "ambilkecamatan.php",
          data: "kota="+kota,
          cache: false,
          success: function(msg){
          $("#kecamatan").html(msg);
          }
          });
          });

          $("#kecamatan").change(function(){
          var kecamatan = $("#kecamatan").val();
          $.ajax({
          url: "ambilkelurahan.php",
          data: "kecamatan="+kecamatan,
          cache: false,
          success: function(msg){
          $("#kelurahan").html(msg);
          }
          });
          });

          // Awal ajax ambil dokter
          $("#instalasitujuan").change(function(){
          var tujuan = $("#instalasitujuan").val();
          $.ajax({
          url: "ambildokter.php",
          data: "tujuanpass="+tujuan,
          cache: false,
          success: function(msg){
            console.log(msg);
          $("#dokterpoli").html(msg);
          }
          });
          });
          // Akhir ajax ambil dokter

          });
        
        </script>

        <script src="caridata.js"></script>
  </body>

  <footer>
    <div class="row mb-5"></div>
  </footer>
</html>
