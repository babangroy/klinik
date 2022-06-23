<?php
include 'fungsi.php';

$propinsi = $_GET['propinsi'];
$sql_kota = mysqli_query($koneksi, "SELECT cities.city_name FROM provinces, cities WHERE provinces.prov_id = cities.prov_id AND provinces.prov_name = '$propinsi' ORDER BY city_name ASC") or die(mysqli_error($koneksi));
echo "<option disabled selected>------------------ Pilih KAB / KOTA ------------------</option>";
while($data_kota = mysqli_fetch_array($sql_kota)){
    ?>
    <option value="<?php echo $data_kota['city_name'];?>"><?php echo $data_kota['city_name'] ?></option>
<?php
}
?>