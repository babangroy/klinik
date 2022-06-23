<?php
include 'fungsi.php';

$kecamatan = $_GET['kecamatan'];
$sql_kel = mysqli_query($koneksi, "SELECT subdistricts.subdis_name FROM districts, subdistricts WHERE districts.dis_id = subdistricts.dis_id AND districts.dis_name = '$kecamatan' ORDER BY subdis_name ASC") or die(mysqli_error($koneksi));
echo "<option disabled selected>------------------ Pilih Kelurahan ------------------</option>";
while($data_kel = mysqli_fetch_array($sql_kel)){
    ?>
    <option value="<?php echo $data_kel['subdis_name'];?>"><?php echo $data_kel['subdis_name'];?></option>
<?php
}
?>