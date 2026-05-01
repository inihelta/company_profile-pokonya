<?php
include('db.php');
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just's Company</title>
</head>

<body>
    <header class="header">
        <div class="container">
            <h1><a href="index.php">Just's Company</a></h1>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="#">Our Product</a></li>
            </ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="product_cari.php" method="post">
                <input type="text" name="search" placeholder="Search">
                <input type="submit" name="cari" value="Search">
            </form>
        </div>
    </div>

    <div class="search">
        <div class="container">
            <p>Silahkan login untuk berbelanja</p>
            <a href="login.php"><b>Click Here</b></a>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Category</h3>
            <div class="box">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                ?>
                        <a href="product.php?kat=<?php echo $k['category_id'] ?>">
                            <div class="col-5">
                                <img src="#" width="20px" alt="error" style="margin-bottom: 5px;">
                                <p><?php echo $k['category_name'] ?></p>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Category, not found!</p>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <h3>Produk Terbaru</h3>
            <div class="box">
                <?php
                ini_set('error_reporting', 0);
                if ($_GET['kat'] == '') {
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 8");
                } else {
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE category_id = '" . $_GET['kat'] . "' AND product_status = 1 ORDER BY product_id DESC LIMIT 8");
                }

                if (mysqli_num_rows($produk) > 0) {
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                        <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['product_image'] ?>">
                                <p class="nama"><?php echo substr($p['product_name'], 0, 30) ?></p>
                                <table width="100%">
                                    <tr>
                                        <td align="left">
                                            <p class="nama"><strong>Stok <?php echo $p['stok'] ?></strong></p>
                                        </td>
                                        <td align="right">
                                            <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <p>Produk tidak ada</p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2023 - Just's Company.</small>
        </div>
    </div>
</body>

</html>