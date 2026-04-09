<?php include '../db.php';
include('session.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dashboard Admin</title>
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
            <?php
            $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
            $d = mysqli_fetch_object($query);
            ?>
            <h2>Selamat Datang Admin : <?php echo $d->admin_name; ?></h2>
        </div>
    </div>
</body>

</html>