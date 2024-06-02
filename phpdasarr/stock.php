<?php
$connect = mysqli_connect("localhost", "root", "", "databarang");

// STOK barang
// function kembalikan data barang BERUPA ARRAY
function stock($query)
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

$dataStock = stock("SELECT * FROM stock");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css datables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style='position:fixed; top:0;right:0;left:0; z-index:9999'>
        <div class="container-fluid">
            <a class="navbar-brand text-success" href="#" style="font-size: 35px;">TokoAfiyah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="buildMasuk/masukanBarang.php">masukanBarang</a>
                    <a class="nav-link" href="buildJual/barangTerjual.php">masukanBarangTerjual</a>
                    <a class="nav-link" href="buildMasuk/barangMasuk.php">dataBarangMasuk</a>
                    <a class="nav-link" href="buildJual/dataBarangTerjual.php">dataBarangTerjual</a>
                    <a class="nav-link" href="stock.php">stock</a>
                    <a class="nav-link" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- STOCK BARANG -->
    <div class="container bungkus-form" style="height:100vh; margin-top:100px; margin-bottom:500px">
        <h1 style="background-color: blue; color:white; padding:10px;">STOCK Barang</h1>
        <p>informasi sisa stock barang</p>
        <br>
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>no</th>
                    <th>namaBarang</th>
                    <th>stock</th>
                    <th>tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $angka = 1 ?>
                <!-- VARIABEL 'DATABARANG' ADAALAH ARRAY OF OBJECT. DENGAN MELAKUKAN FOREACH AMBIL OBJECT DAN AMBIL VALUE DARI OBJECTNYA -->
                <!-- array of object di foreach -->
                <?php foreach ($dataStock as $stock) : ?>
                    <tr>
                        <td><?= $angka ?></td>
                        <td><?php echo $stock['namaBarang']; ?></td>
                        <td><?php echo $stock['stock']; ?></td>
                        <td><?php echo $stock['tanggal']; ?></td>
                        <!-- hapus berdasarkan id -->
                        <?php $angka++ ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
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


    <!-- SCRIPT CDN DATABLES BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myTable").DataTable({
                // scroll X
                scrollX: true,
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>