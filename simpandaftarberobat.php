<?php
include 'fungsi.php';

      if (isset($_POST['simpandaftar'])) {
      
      $RMS = $_POST['normpass'];
      $namaPasiens = $_POST['namapasienpass'];
      $tujuan = $_POST['tujuan'];
      $statuss = $_POST['statuspeserta'];
      $keluhas = $_POST['keluhan'];
      $beratbadan = $_POST['beratbadan'];
      $instalasitujuans = $_POST['instalasitujuan'];
      $dokterpolis = $_POST['dokterpoli'];

      $bblengkap = $beratbadan." Kg";
      $tgldaftars = date("Y-m-d");
      $keaktifan = "AKTIF";
      
      $simpan = mysqli_query($koneksi, "INSERT INTO tb_poli VALUES(NULL,'$RMS','$tgldaftars','$namaPasiens','$tujuan','$statuss',
      '$keluhas','$bblengkap','$instalasitujuans','$dokterpolis','$keaktifan')") or die(mysqli_error($koneksi));
        
      if($simpan)
        {
          echo '<script type="text/javascript">window.location="pendataan.php"</script>';    
        }
      else
        {
        echo "<script>alert('Gagal Menyimpan Data ')</script>";
        echo '<script type="text/javascript">window.location="pendataan.php"</script>'; 
        }
    }
                    
?>