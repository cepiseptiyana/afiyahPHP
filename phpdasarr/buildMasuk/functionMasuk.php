<?php
$connect = mysqli_connect("localhost", "root", "", "databarang");
function hapus($id)
{
    global $connect;
    // hapus data ke database table "MASUK"
    mysqli_query($connect, "DELETE FROM masuk WHERE id = $id");

    // memberi informasi berapa rows pada connect jika ada perubahan
    return mysqli_affected_rows($connect);
}
