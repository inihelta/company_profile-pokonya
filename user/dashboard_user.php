<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard_user.php">Just's Company</a></h1>
            <ul>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="product.php">Our Product</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>welcome to our company <?php echo $user_row['username']; ?></h4>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">

        </div>
    </div>

    <footer>
        <div class="container">
            <p>Copyright &copy; 2026 - Just's Company.</p>
    </footer>
</body>

</html>