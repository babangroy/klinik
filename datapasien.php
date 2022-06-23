<?php
include 'fungsi.php';

$keyword = $_GET["keyword"];

$data = mysqli_query($koneksi, "SELECT * FROM tb_pendataan WHERE NoRM LIKE '%$keyword%' OR NamaPasien LIKE'%$keyword%' ORDER BY NoRM DESC");
$datapas = ($data);
?>

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
          foreach ($datapas as $row) :
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
          <td><?= $row['Alamat'] ?></td>
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

    <script src="jquery.js"></script>
    <script type="text/javascript">
    var htmlobjek;
    $(document).ready(function(){
    //apabila terjadi event onchange terhadap object <select id=propinsi>
    $("#instalasitujuan").change(function(){
    var instalasitujuan = $("#instalasitujuan").val();
    $.ajax({
    url: "ambildokter.php",
    data: "instalasitujuan="+instalasitujuan,
    cache: false,
    success: function(msg){
    //jika data sukses diambil dari server kita tampilkan
    //di <select id=kota>
    $("#dokterpoli").html(msg);
    }
    });
    });
  });
  </script>
    <!-- Akhir Ajax Pilih Dokter -->