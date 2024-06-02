<?php
// MEMBUAT KONEKSI KE DATABASE "DATABARANG"
$connect = mysqli_connect("localhost", "root", "", "databarang");

// BUAT FUNCTION TAMBAH DATA
// PARAMAETER BERISI $_POST
function tambah($post)
{
    global $connect;
    $namaBarang = htmlspecialchars($post["namaBarang"]);
    $jumlahBarangMasuk = htmlspecialchars($post["jumlahBarangMasuk"]);
    $totalHargaBeliBarang = htmlspecialchars($post["totalhargabeliBarang"]);
    $tanggal = htmlspecialchars($post["tanggal"]);

    // UPDATE TABEL "STOCK" BARANG 
    // AMBIL DATA SESUAI NAMA BARANG DARI USER
    $stockData = mysqli_query($connect, "SELECT * FROM stock WHERE namaBarang='$namaBarang'");
    $resultStock = mysqli_fetch_array($stockData);
    $stockSekarang = $resultStock["stock"];

    // masukan STOCK ke database tabel "stock"
    $tambahStock = $stockSekarang + $jumlahBarangMasuk;
    $updateStock = "UPDATE stock SET stock='$tambahStock', tanggal='$tanggal' WHERE namaBarang='$namaBarang'";
    mysqli_query($connect, $updateStock);


    // JIKA GAGAL MEMASUKAN DATA KE TABEL 'MASUK' MENGEMBALIKAN JUMLAH ROWS PADA KONEKSI DATRABASE 
    // masukan data ke TABLE 'MASUK'
    $query = "INSERT INTO masuk (namaBarang,jumlahBarangMasuk,totalHargaBeliBarang,tanggal) VALUES ('$namaBarang','$jumlahBarangMasuk','$totalHargaBeliBarang','$tanggal')";
    mysqli_query($connect, $query);
    // mengirim error KE KONEKSI DATRABASE 
    return mysqli_affected_rows($connect);
}

// $stock = "UPDATE stock SET stock (namaBarang,stock) VALUES ('$namaBarang')";
// var_dump($stock);

// cek apakah tombol sumbit sudah di KLIK 
if (isset($_POST["submit"])) {
    // JALANKAN FUNCTION TAMBAH DATA DENGAN ARGUMENT $_POST
    // FUNCTION TAMBAH() AKAN MENGHASILKAN NILAI
    if (tambah($_POST) > 0) {
        // kalo berhasil ditambahkan data
        // dan redirect kehalaman "barangMasuk" menggunakan javascript
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'barangMasuk.php';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'masukanBarang.php';
        </script>
    ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>masukanBarangStock</title>
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style='position:fixed; top:0;right:0;left:0;z-index:9999'>
        <div class="container-fluid">
            <a class="navbar-brand text-success" href="#" style="font-size: 35px;">TokoAfiyah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="masukanBarang.php">masukanBarangStock</a>
                    <a class="nav-link" href="../buildJual/barangTerjual.php">masukanBarangTerjual</a>
                    <a class="nav-link" href="barangMasuk.php">dataBarangMasuk</a>
                    <a class="nav-link" href="../buildJual/dataBarangTerjual.php">dataBarangTerjual</a>
                    <a class="nav-link" href="../stock.php">stock</a>
                    <a class="nav-link" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="width:70%; margin-top:100px; height:100vh">
        <!-- ELEMENT FORM METHOD POST -->
        <form method="post" action="">
            <div class="mb-3">
                <!-- ATRIBUT NAME = namaBarang -->
                <label for="namaBarang" class="form-label">NamaBarang</label>
                <select name="namaBarang" class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option>Amplop</option>
                    <option>Buku Nota Kecil</option>
                    <option>Buku Nota Sedang</option>
                    <option>Buku Tulis</option>
                    <option>Kertas A5</option>
                    <option>Kertas A4</option>
                    <option>Kertas F4</option>
                    <option>Kertas Sampul Buku</option>
                    <option>Map</option>
                    <option>Materai 10.000</option>
                    <option>Pensil</option>
                    <option>Pulpen</option>
                </select>

            </div>
            <div class="mb-3">
                <!-- ATRIBUT NAME = jumlahBarangMasuk -->
                <label for="jumlahBarangMasuk" class="form-label">Jumlah barang masuk</label>
                <input type="text" class="form-control" id="jumlahBarangMasuk" aria-describedby required="emailHelp" name='jumlahBarangMasuk' placeholder="0">
            </div>
            <div class="mb-3">
                <!-- ATRIBUT NAME = totalHargaBeliBarang -->
                <label for="totalHargaBeliBarang" class="form-label">Total harga beli barang : <br> Contoh = 20.000</label>
                <input type="text" class="form-control" id="totalHargaBeliBarang" aria-describedby required="emailHelp" name='totalhargabeliBarang' placeholder="0">
            </div>
            <div class="mb-3">
                <!-- ATRIBUT NAME = tanggal -->
                <label for="tanggal" class="form-label">Tanggal : Tahun-Bulan-Tanggal</label>
                <input type="text" class="form-control" id="tanggal" aria-describedby required="emailHelp" name='tanggal' placeholder="Tahun-Bulan-Tanggal">
            </div>
            <!-- ATRIBUT NAME = SUBMIT -->
            <button type="submit" class="btn btn-primary" name='submit'>Tambah data</button>
        </form>
    </div>

    <!--! FOOTER -->
    <footer style='border-top:1px solid black;position:relative'>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-sm">
                    <div class="container">
                        <h5 style="text-transform: capitalize">tentang kami</h5>
                        <h6>Alamat :</h6>
                        <a href="https://maps.app.goo.gl/QrKaGvXUDhe3ZHV3A">&#127978; V97J+CQ Renged, Kabupaten Serang, Banten</a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="container">
                        <h5 style="text-transform: capitalize">&#128383; hubungi</h5>
                        <a href="https://wa.me/6281212275509/?text=Hello">Pak Anas</a>
                    </div>
                </div>
            </div>
        </div>
        <a href="https://wa.me/6285659519463/?text=Hello" style="position:absolute;bottom:0;right:0;text-decoration:none">&#169; Cepi Septiyana</a>
    </footer>


    <!-- script js -->
    <script src="select.js"></script>
    <!-- script js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>



</html>