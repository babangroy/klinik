<?php 
include 'fungsi.php';

    if (isset($_POST['simpan']))
    {
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
        $prov = $_POST['propinsi'];
        $kot = $_POST['kota'];
        $kec = $_POST['kecamatan'];
        $kel = $_POST['kelurahan'];
        $noTlp = $_POST['notel'];
        $kerjaan = $_POST['pekerjaan'];
        $pendidikan = $_POST['pendidikan'];

        $alamatlengkap = $alamat.", KEL. ".$kel.", KEC. ".$kec.", KAB/KOTA. ".$kot.", PROV. ".$prov;
        $tglregis = date("Y-m-d");
                
            $simpan = mysqli_query($koneksi, "INSERT INTO tb_pendataan VALUES(NULL,'$tglregis','$namaPasien','$jekel','$tmptLahir','$tglLahir',
            '$statusNikah','$suku','$agama','$kebangsaan','$golDarah','$alamatlengkap','$noTlp','$kerjaan','$pendidikan')") or die(mysqli_error($koneksi));
    
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