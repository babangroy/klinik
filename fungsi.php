<?php
// Koneksi Database
$koneksi = mysqli_connect("localhost", "root", "", "yklinik");

// Membuat fungsi hapus
function hapus($rmH)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM tb_pendataan WHERE NoRM = $rmH");
    return mysqli_affected_rows($koneksi);
}

