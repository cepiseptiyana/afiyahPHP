<?php
// ambil data dari functions.php
require "functionsMasuk.php";
// variabel databarang berupa array of object
$dataBarang = query("SELECT * FROM masuk");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>databarangMasuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS DATATABLES BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
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
                    <a class="nav-link active" aria-current="page" href="masukanBarang.php">masukanBarang</a>
                    <a class="nav-link" href="../buildJual/barangTerjual.php">masukanBarangTerjual</a>
                    <a class="nav-link" href="barangMasuk.php">dataBarangMasuk</a>
                    <a class="nav-link" href="../buildJual/dataBarangTerjual.php">dataBarangTerjual</a>
                    <a class="nav-link" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="width:70%; margin-top:100px; height:100vh;">
        <table id="myTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>no</th>
                    <th>id</th>
                    <th>namaBarang</th>
                    <th>jumlahBarangMasuk</th>
                    <th>totalHargaBeliBarang</th>
                    <th>tanggal</th>
                    <th>detail</th>
                </tr>
            </thead>
            <tbody>
                <!-- array of object di foreach -->
                <?php $angka = 1 ?>
                <?php foreach ($dataBarang as $row) : ?>
                    <tr>

                        <td><?= $angka ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['namaBarang']; ?></td>
                        <td><?php echo $row['jumlahBarangMasuk']; ?></td>
                        <td><?php echo $row['totalHargaBeliBarang']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <!-- hapus berdasarkan id -->
                        <td> <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
</body>

</html>