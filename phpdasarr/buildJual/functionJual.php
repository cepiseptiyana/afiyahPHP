<?php
$connect = mysqli_connect("localhost", "root", "", "databarang");
function hapus($id)
{
    global $connect;
    // hapus data ke database barang jual berdasarkan id yang sama!
    // query jika gagal ga mengembalikan error atau false
    // jika id ga di temukan di database Query false atau ga di jalankan mysqli_query nya!
    mysqli_query($connect, "DELETE FROM jual WHERE id = $id");
    return mysqli_affected_rows($connect);
}
