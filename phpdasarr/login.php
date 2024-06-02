<?php
$connect = mysqli_connect("localhost", "root", "", "databarang");

if (isset($_POST["klikLogin"])) {
    $username = $_POST["username"];
    $password = $_POST["passwordLogin"];

    // cek ada ga username di database yang sama dengan username yg di isi pada form input
    $resultUser = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' ");

    // cek menggunakan mysqli_num_rows = ada berapa baris di variabel resultUser;
    // cek variabel resultUser akan menghasilkan "1" jika username di temukan jika ga ditemukan nilainya "0"
    if (mysqli_num_rows($resultUser) === 1) {
        // cek password 
        $row = mysqli_fetch_assoc($resultUser);
        if ($row['username'] === $username && $row['password'] === $password) {
            // jika username dan password benar
            // lanjut login ke halaman masukanBarang.php
            header("Location: buildMasuk/masukanBarang.php");
            exit;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- my css -->
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-image: url(./kmp.jpg);background-position:center;background-size:cover;">
    <div class="container gambar" style="height: 100vh; display:flex; align-items:center;">
        <div class="container ct" style="border:1px solid black;padding:15px">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="passwordLogin" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordLogin" name="passwordLogin">
                </div>
                <button type="submit" class="btn btn-primary" name="klikLogin">LogIn</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>