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
    $jumlahBarangMasuk = htmlspecialchars($post["jumlahBarangMasuk"]);
    $totalHargaBeliBarang = htmlspecialchars($post["totalhargabeliBarang"]);
    $tanggal = htmlspecialchars($post["tanggal"]);

    // masukan data ke database barang masuk
    $query = "INSERT INTO masuk VALUE ('','$namaBarang','$jumlahBarangMasuk','$totalHargaBeliBarang','$tanggal')";
    mysqli_query($connect, $query);
    // mengirim error di dalam koneksi
    return mysqli_affected_rows($connect);
}

function hapus($id)
{
    global $connect;
    // hapus data ke database barang masuk
    mysqli_query($connect, "DELETE FROM masuk WHERE id = $id");

    return mysqli_affected_rows($connect);
}
