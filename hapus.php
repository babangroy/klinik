<?php
include 'fungsi.php';

$rmH = $_GET['NoRM'];

if (hapus($rmH) > 0) {
    echo "<script>
                document.location.href = 'pendataan.php';
            </script>";
} else {
    echo "<script>
            alert('Data pasien gagal dihapus!');
        </script>";
}
