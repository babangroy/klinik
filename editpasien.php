<?php
include 'fungsi.php';

$rmE = $_GET['NoRM'];
$datapasien = mysqli_query($koneksi, "SELECT * FROM tb_pendataan where NoRM = $rmE") or die(mysqli_error($koneksi));
while($dataedit = mysqli_fetch_array($datapasien)){
  $sqledit=$dataedit;
  }
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
    <title>Edit Data Pasien | Klinik</title>
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
      <h1 class="fw-semibold"><i class="bi bi-pencil-square me-2"></i>Edit Data Pasien</h1>
      <hr />
    </div>

    <!-- Awal Form Pendaftaran -->
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-3 ms-auto">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">No Rekam Medis</label>
              <input type="text" readonly class="form-control" placeholder="Masukkan No Rekam Medis" id="exampleInputEmail1" value="<?php echo $rmE; ?>" name="noRM" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail2" class="form-label mt-2">Nama Pasien</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Pasien" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="exampleInputEmail2" value="<?php echo $sqledit['NamaPasien']; ?>" name="namapasien" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="Pilih1" class="form-label mt-2">Jenis Kelamin</label>
              <select class="form-select" aria-label="Default select example" id="Pilih1" name="JenisKelamin" autocomplete="off" required>
                <option disabled value>---------- Pilih Jenis Kelamin ----------</option>
                <option value="LAKI - LAKI"<?php if ($sqledit['JenisKelamin']=="LAKI - LAKI") echo "selected" ?>>LAKI - LAKI</option>
                <option value="PEREMPUAN"<?php if ($sqledit['JenisKelamin']=="PEREMPUAN") echo "selected" ?>>PEREMPUAN</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="tempatlahir" class="form-label mt-2">Tempat Lahir</label>
              <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="tempatlahir" value="<?php echo $sqledit['TempatLahir']?>" name="tmptlahir" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="tglhr" class="form-label mt-2">Tanggal Lahir</label>
              <input type="date" class="form-control" placeholder="Masukkan Tempat Lahir" id="tglhr" value="<?php echo $sqledit['TanggalLahir'] ?>" name="tglhr" autocomplete="off" required />
            </div>
           
            <div class="mb-3">
              <label for="sttsnikah" class="form-label mt-2">Status Menikah</label>
              <select class="form-select" aria-label="Default select example" id="sttsnikah" name="statusnikah" autocomplete="off" required>
                <option disabled value>-------- Pilih Status Menikah --------</option>
                <option value="MENIKAH"<?php if ($sqledit['Status']=="MENIKAH") echo "selected" ?>>MENIKAH</option>
                <option value="BELUM MENIKAH"<?php if ($sqledit['Status']=="BELUM MENIKAH") echo "selected" ?>>BELUM MENIKAH</option>
                <option value="JANDA"<?php if ($sqledit['Status']=="JANDA") echo "selected" ?>>JANDA</option>
                <option value="DUDA"<?php if ($sqledit['Status']=="DUDA") echo "selected" ?>>DUDA</option>
                <option value="DIBAWAH UMUR"<?php if ($sqledit['Status']=="DIBAWAH UMUR") echo "selected" ?>>DIBAWAH UMUR</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="sukui" class="form-label mt-2">Suku</label>
              <input type="text" class="form-control" placeholder="Masukkan Suku" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="sukui" value="<?php echo $sqledit['Suku'] ?>" name="suku" autocomplete="off" required />
            </div>
        </div>
            

        <div class="col-3 me-auto">
        <div class="mb-3">
              <label for="agamai" class="form-label">Agama</label>
              <select class="form-select" aria-label="Default select example" id="agamai" name="agama" autocomplete="off" required>
              <?php
                echo "<selected value=\"$sqledit[Agama]\">$sqledit[Agama]</option>\n";
                ?>
                <option disabled value>------------- Pilih Agama -------------</option>
                <option value="ISLAM"<?php if ($sqledit['Agama']=="ISLAM") echo "selected" ?>>ISLAM</option>
                <option value="KRISTEN PROTESTAN"<?php if ($sqledit['Agama']=="KRISTEN PROTESTAN") echo "selected" ?>>KRISTEN PROTESTAN</option>
                <option value="KATOLIK"<?php if ($sqledit['Agama']=="KATOLIK") echo "selected" ?>>KATOLIK</option>
                <option value="HINDU"<?php if ($sqledit['Agama']=="HINDU") echo "selected" ?>>HINDU</option>
                <option value="BUDHA"<?php if ($sqledit['Agama']=="BUDHA") echo "selected" ?>>BUDHA</option>
                <option value="KONGHUCU"<?php if ($sqledit['Agama']=="KONGHUCU") echo "selected" ?>>KONGHUCU</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="bangsai" class="form-label">Kebangsaan</label>
              <select class="form-select" aria-label="Default select example" id="bangsai" name="kebangsaan" autocomplete="off" required>
                <?php
                echo "<selected value=\"$sqledit[Kebangsaan]\">$sqledit[Kebangsaan]</option>\n";
                ?>
                <option disabled value>------------- Pilih Kebangsaan -------------</option>
                <option value="WNI"<?php if ($sqledit['Kebangsaan']=="WNI") echo "selected" ?>>WNI</option>
                <option value="WNA"<?php if ($sqledit['Kebangsaan']=="WNA") echo "selected" ?>>WNA</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="goldarah" class="form-label">Golongan Darah</label>
              <input type="Text" class="form-control" placeholder="Masukkan Golongan Darah" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" id="goldarah" value="<?php echo $sqledit['GolonganDarah'] ?>" name="golongandarah" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="alamati" class="form-label">Alamat</label>
              <textarea rows="3" name="alamat" class="form-control" placeholder="Masukkan Alamat" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" value="" id="alamati"><?php echo $sqledit['Alamat'] ?></textarea>
            </div>
            <div class="mb-3">
              <label for="notel" class="form-label">No Telephone</label>
              <input type="number" class="form-control" placeholder="Masukkan No Telephone" id="notel" value="<?php echo $sqledit['NoTelp'] ?>" name="notel" autocomplete="off" required />
            </div>
            <div class="mb-3">
              <label for="pekerjaan" class="form-label">Pekerjaan</label>
              <select class="form-select" aria-label="Default select example" id="pekerjaan" name="pekerjaan" autocomplete="off" required>
                <option disabled selected value>---------- Pilih Pekerjaan ----------</option>
                <option value="PEGAWAI NEGERI"<?php if ($sqledit['Pekerjaan']=="PEGAWAI NEGERI") echo "selected" ?>>PEGAWAI NEGERI</option>
                <option value="PEGAWAI SWASTA"<?php if ($sqledit['Pekerjaan']=="PEGAWAI SWASTA") echo "selected" ?>>PEGAWAI SWASTA</option>
                <option value="WIRA SWASTA"<?php if ($sqledit['Pekerjaan']=="WIRA SWASTA") echo "selected" ?>>WIRA SWASTA</option>
                <option value="WIRA USAHA"<?php if ($sqledit['Pekerjaan']=="WIRA USAHA") echo "selected" ?>>WIRA USAHA</option>
                <option value="TNI / POLRI"<?php if ($sqledit['Pekerjaan']=="TNI / POLRI") echo "selected" ?>>TNI / POLRI</option>
                <option value="PENSIUNAN"<?php if ($sqledit['Pekerjaan']=="PENSIUNAN") echo "selected" ?>>PENSIUNAN</option>
                <option value="PELAJAR"<?php if ($sqledit['Pekerjaan']=="PELAJAR") echo "selected" ?>>PELAJAR</option>
                <option value="TIDAK BEKERJA"<?php if ($sqledit['Pekerjaan']=="TIDAK BEKERJA") echo "selected" ?>>TIDAK BEKERJA</option>
                
              </select>
            </div>
            <div class="mb-3">
              <label for="pendidikan" class="form-label">Pendidikan</label>
              <select class="form-select" aria-label="Default select example" id="pendidikan" name="pendidikan" autocomplete="off" required>
                <option disabled selected value>---------- Pilih Pendidikan ----------</option>
                <option value="SD"<?php if ($sqledit['Pendidikan']=="SD") echo "selected" ?>>SD</option>
                <option value="SMP"<?php if ($sqledit['Pendidikan']=="SMP") echo "selected" ?>>SMP</option>
                <option value="SMA/SMK"<?php if ($sqledit['Pendidikan']=="SMA/SMK") echo "selected" ?>>SMA/SMK</option>
                <option value="DIPLOMA"<?php if ($sqledit['Pendidikan']=="DIPLOMA") echo "selected" ?>>DIPLOMA</option>
                <option value="SARJANA"<?php if ($sqledit['Pendidikan']=="SARJANA") echo "selected" ?>>SARJANA</option>
                <option value="MAGISTER"<?php if ($sqledit['Pendidikan']=="MAGISTER") echo "selected" ?>>MAGISTER</option>
                <option value="NON PENDIDIKAN"<?php if ($sqledit['Pendidikan']=="NON PENDIDIKAN") echo "selected" ?>>NON PENDIDIKAN</option>
              </select>
            </div>
          </div>
            
            <div class="row text-center mt-3">
              <div class="col">
            <button type="submit" class="btn btn-primary btn-lg" style="width: 120px; font-weight:600; background-color: #007AB8;" id="edit" name="edit"><i class="bi bi-pencil-square me-1"></i>Edit </button> |
            <a class="btn btn-danger btn-lg" href="pendataan.php" style="width: 120px; font-weight:600;" role="button"><i class="bi bi-x-square me-1"></i>Batal</a>
            </div>
            </div>


                <!-------------------------------- Simpan Data ----------------------------- -->
                <?php 
                if (isset($_POST['edit'])) {
                
                $RM = $_POST['noRM'];
                $namaPasien = $_POST['namapasien'];
                $jekel = $_POST['JenisKelamin'];
                $tmptLahir = $_POST['tmptlahir'];
                $tglLahir = $_POST['tglhr'];
                $statusNikah = $_POST['statusnikah'];
                $suku = $_POST['suku'];
                $agama = $_POST['agama'];
                $kebangsaan = $_POST['kebangsaan'];
                $golDarah = $_POST['golongandarah'];
                $alamat = $_POST['alamat'];
                $noTlp = $_POST['notel'];
                $kerjaan = $_POST['pekerjaan'];
                $pendidikan = $_POST['pendidikan'];
                
                $edit = mysqli_query($koneksi, "UPDATE tb_pendataan SET NamaPasien='$namaPasien', JenisKelamin='$jekel', TempatLahir='$tmptLahir',TanggalLahir='$tglLahir', Status='$statusNikah', Suku='$suku', Agama='$agama', Kebangsaan='$kebangsaan', GolonganDarah='$golDarah', Alamat='$alamat', NoTelp='$noTlp', Pekerjaan='$kerjaan', Pendidikan='$pendidikan' WHERE NoRM='$RM'") or die(mysqli_error($koneksi));
                  
                if($edit)
                  {
                    echo "<script>alert('Data Berhasil diedit ')</script>";
                    echo '<script type="text/javascript">window.location="pendataan.php"</script>';    
                  }
                else
                  {
                  echo "<script>alert('Gagal Menyimpan Data ')</script>";
                  echo '<script type="text/javascript">window.location="pendataan.php"</script>'; 
                  }
              }
              ?>
                 <!------------------------------- Akhir Simpan Data -------------------------------------- -->
          </form>
        </div>
      </div>
        <!-- Akhir Form Pendaftaran -->

   
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

        });
        
        </script>
  </body>

  <footer>
    <div class="row mb-5"></div>
  </footer>
</html>
