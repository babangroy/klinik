<?php
include 'fungsi.php';

$tujuan = $_GET['tujuanpass'];
$sql_dokter = mysqli_query($koneksi, "SELECT NamaDokter FROM tb_dokter WHERE Spesialis='$tujuan' ORDER BY NamaDokter ASC") or die(mysqli_error($koneksi));
echo "<option disabled selected>--------------------- Pilih Dokter Poli ---------------------</option>";
while($data_dokter = mysqli_fetch_array($sql_dokter)){
    ?>
    <option value="<?php echo $data_dokter['NamaDokter'];?>"><?php echo $data_dokter['NamaDokter'];?></option>
<?php
}
?>