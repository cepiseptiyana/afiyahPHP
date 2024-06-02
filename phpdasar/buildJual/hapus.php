<?php
require 'functionTerjual.php';

// ambil get berdasarkan "id" 
$id = $_GET["id"];
if (hapus($id) > 0) {
    echo " <script>
    alert('data berhasil dihapus');
    document.location.href = 'dataBarangTerjual.php';
</script>";
} else {
    echo " <script>
    alert('data gagal dihapus');
    document.location.href = 'dataBarangTerjual.php';
</script>";
}
