<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | adalah pokonya</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body id="bg-login">

    <div class="box-login">
        <h2>Login</h2>

        <form action="" method="POST">
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
            <br>
            <label>Belum punya akun?</label> <a href="register.php"><strong>Klik Disini untuk Register</strong></a>
        </form>

        <?php
        include('db.php');

        if (isset($_POST['submit'])) {
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $sql = mysqli_query(
                $conn,
                "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'"
            ) or die(mysqli_error($conn));

            if (mysqli_num_rows($sql) == 0) {
                echo "<script>alert('Username / Password salah!')</script>";
                echo "<script type='text/javascript'>window.location='login.php'</script>";
            } else {
                session_start();
                $row = mysqli_fetch_assoc($sql);

                $_SESSION['id_login'] = $row['admin_id'];
                $_SESSION['level'] = $row['level'];
                $_SESSION['status_login'] = true;

                if ($row['level'] == 'admin') {
                    echo "<script>alert('Success')</script>";
                    echo "<script type='text/javascript'>window.location='admin/dashboard.php'</script>";
                } elseif ($row['level'] == 'pelanggan') {
                    echo "<script>alert('Success')</script>";
                    echo "<script type='text/javascript'>window.location='user/dashboard_user.php'</script>";
                } else {
                    header('location:index.php');
                }
            }
        }
        ?>
    </div>

</body>

</html>