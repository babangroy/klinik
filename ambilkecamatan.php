<?php
include 'fungsi.php';

$kota = $_GET['kota'];
$sql_kecamatan = mysqli_query($koneksi, "SELECT districts.dis_name FROM cities, districts WHERE cities.city_id = districts.city_id AND cities.city_name = '$kota' ORDER BY dis_name ASC") or die(mysqli_error($koneksi));
echo "<option disabled selected>------------------ Pilih Kecamatan ------------------</option>";
while($data_kec = mysqli_fetch_array($sql_kecamatan)){
    ?>
    <option value="<?php echo $data_kec['dis_name'];?>"><?php echo $data_kec['dis_name'];?></option>
<?php
}
?>