<?php
require 'functionMasuk.php';
// ambil request get  
$id = $_GET["idMasuk"];
if (hapus($id) > 0) {
    echo " <script>
    alert('data berhasil dihapus');
    document.location.href = 'barangMasuk.php';
</script>";
} else {
    echo " <script>
    alert('data gagal dihapus');
    document.location.href = 'barangMasuk.php';
</script>";
}
