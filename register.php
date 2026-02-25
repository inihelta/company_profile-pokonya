<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Halaman Register</title>
</head>

<body id="bg-login">

    <div class="box-login">
        <h2>Isi data anda</h2>
        <form action="" method="POST">
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
            <input type="text" name="telpon" placeholder="Nomor Telpon" class="input-control" required>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
            <input type="text" name="email" placeholder="Email" class="input-control" required>
            <hr>
            <br>
            <input type="text" name="user" placeholder="Username" class="input-control" required>
            <input type="text" name="pass" placeholder="Password" class="input-control" required>

            <input type="submit" name="submit" value="Register" class="btn">
        </form>

        <?php
        include('db.php');
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon'];
            $email = $_POST['email'];
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
                null,
                '" . $nama . "',
                '" . $username . "',
                '" . $password . "',
                '" . $telpon . "',
                '" . $email . "',
                '" . $alamat . "',
                'pelanggan'
                ) ");

            if ($insert) {
                echo "<script>alert('Register Berhasil, Silahkan Login');window.location='login.php'</script>";
                echo "<script type='text/javascript'>window.location='login.php'</script>";
            } else {
                echo "<script>alert('Register Gagal');</script>";
                echo "<script type='text/javascript'>window.location='register.php'</script>";
            }
        }
        ?>


    </div>
</body>

</html>