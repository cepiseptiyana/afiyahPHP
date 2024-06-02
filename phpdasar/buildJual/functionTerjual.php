<?php
$connect = mysqli_connect("localhost", "root", "", "databarang");
// function kirim data ke halaman databarangmasuk
function query($query)
{
    global $connect;
    // ambil data tabel barang masuk
    $result = mysqli_query($connect, $query);
    $rows = [];
    // looping semua data object barang masuk
    while ($row = mysqli_fetch_array($result)) {
        // masukan data ke variabel rows
        $rows[] = $row;
    }
    // kembalikan array
    return $rows;
}

function tambah($post)
{
    global $connect;
    $namaBarang = htmlspecialchars($post["namaBarang"]);
    $jumlahBarangTerjual = htmlspecialchars($post["jumlahBarangTerjual"]);
    $jumlahHargaTerjual = htmlspecialchars($post["jumlahHargaTerjual"]);
    $tanggal = htmlspecialchars($post["tanggal"]);

    // masukan data ke database barang jual
    // jika insert gagal Query false atau ga di jalankan mysqli_query nya!
    // dan ga dimasukan datanya
    $query = "INSERT INTO jual VALUE ('','$namaBarang','$jumlahBarangTerjual','$jumlahHargaTerjual','$tanggal')";
    mysqli_query($connect, $query);
    // jika query gagal affected -1 artinya ada error di connection database
    // mengirim error di dalam koneksi
    return mysqli_affected_rows($connect);
}



function hapus($id)
{
    global $connect;
    // hapus data ke database barang jual berdasarkan id yang sama!
    // query jika gagal ga mengembalikan error atau false
    // jika id ga di temukan di database Query false atau ga di jalankan mysqli_query nya!
    mysqli_query($connect, "DELETE FROM jual WHERE id = $id");
    return mysqli_affected_rows($connect);
}
