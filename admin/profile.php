<?php include('session.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <link rel="stylesheet" href="../css/styleadmin.css">
</head>

<body>
    <div class="wrapper">
        <div class="header"></div>
        <div class="sidebar">
            <div class="sidebar-title"><b>Just's Company</b></div>
            <ul>
                <?php include 'sidebar.php' ?>
            </ul>
        </div>

        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
                $d = mysqli_fetch_object($query);
                ?>
                <form action="" id="contact" method="post">
                    <h3>Profil</h3>
                    <fieldset>
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" value="<?php echo $d->admin_name; ?>" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="user" placeholder="Username" class="form-control" value="<?php echo $d->username; ?>" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="hp" placeholder="Nomor HP" class="form-control" value="<?php echo $d->admin_telp; ?>" required>
                    </fieldset>
                    <fieldset>
                        <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $d->admin_email; ?>" required>
                    </fieldset>
                    <fieldset>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" value="<?php echo $d->admin_address; ?>" required>
                    </fieldset>
                    <fieldset>
                        <button type="submit" name="submit" id="contact-submit" data-submit="...sending">
                            Ubah Profil
                        </button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nama = $_POST['nama'];
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $email = $_POST['email'];
                    $alamat = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                        admin_name = '" . $nama . "',
                                        username = '" . $user . "', 
                                        admin_telp = '" . $hp . "',
                                        admin_email = '" . $email . "',
                                        admin_address = '" . $alamat . "'
                                        WHERE admin_id = '" . $d->admin_id . "' ");
                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profile.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
                ?>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
                $d = mysqli_fetch_object($query);
                ?>
                <form action="" id="contant" method="post">
                    <h3>Ubah Password</h3>
                    <fieldset>
                        <input type="password" name="pass1" placeholder="Password Baru" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <input type="password" name="pass2" placeholder="Konfirmasi Password" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button type="submit" name="ubah_password" id="contact-submit" data-submit="...sending">
                            Ubah Password
                        </button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['ubah_password'])) {
                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if ($pass1 != $pass2) {
                        echo '<script>alert("Konfirmasi Password Tidak Sesuai")</script>';
                    } else {
                        $update = mysqli_query($conn, "UPDATE tb_admin SET 
                                        password = '" . $pass1 . "'
                                        WHERE admin_id = '" . $d->admin_id . "' ");
                        if ($update) {
                            echo '<script>alert("Ubah password berhasil")</script>';
                            echo '<script>window.location="profile.php"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>