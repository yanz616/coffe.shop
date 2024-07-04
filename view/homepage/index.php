<?php include "../../data/index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Homepage</title>
</head>

<body>
    <?php include '../template/navbar.php' ?>
    <div class="hero">
        <div class="cta">
            <span class="hero-title-container">
                <p class="hero-title">Classic </p>
                <p class="hero-title2">Coffee, </p>
            </span>
            <span class="hero-title-container2">
                <p class="hero-title">Moderen</p>
                <p class="hero-title2">Comfort</p>

            </span>
            <p class="hero-desc">At Our Coffee store, we revive the authentic flavors of traditional coffee. From selected coffee beans to perfect brewing, we offer a coffee experience rich in history and taste.</p>
            <a href="#" class="cta-btn">
                Explore Now
            </a>
        </div>
        <img class="hero-img" src="../../assets/images/hero-logo.png" alt="err">
    </div>
    <!-- product section -->
    <div class="product">
        <div class="product-title">
            <img src="../../assets/images/coffee-logo.png" alt="erorr" width=54 height=65>
            <p class="product-slog">Explore Our Products</p>
            <p class="product-slog2">
                Discover our diverse range of products that cater to your needs.
            </p>
        </div>
        <div class="product-container">
            <span class="product-filter">
                Roasted Coffee
            </span>
            <div class="card-container">
                <?php
                $sql2 = "SELECT * FROM product";
                $q2 = mysqli_query($db, $sql2);
                while ($r1 = mysqli_fetch_array($q2)) {
                    $id = $r1['id'];
                    $nama_product = $r1['nama_product'];
                    $harga = $r1['harga'];
                    $deskripsi = $r1['desk'];
                    $gambar = $r1['gambar'];
                    $stock = $r1['stock'];
                ?>
                    <div class="card">
                        <img src="<?= $gambar ?>" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nama_product ?></h5>
                            <p class="card-price"><?= $harga ?></p>
                            <span class="action-card">
                                <a href="../../view/detail/index.php?id=<?=$id?>" class="btn-card-action">Order Now</a>
                                <i class="bi bi-heart heart"></i>
                            </span>
                        </div>

                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="product-container">
            <span class="product-filter">
                Ready To Drink
            </span>
            <div class="card-container">
                <?php
                $sql2 = "SELECT * FROM product";
                $q2 = mysqli_query($db, $sql2);
                while ($r1 = mysqli_fetch_array($q2)) {
                    $id = $r1['id'];
                    $nama_product = $r1['nama_product'];
                    $harga = $r1['harga'];
                    $deskripsi = $r1['desk'];
                    $gambar = $r1['gambar'];
                    $stock = $r1['stock'];
                ?>
                    <div class="card">
                        <img src="<?= $gambar ?>" class="card-img" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $nama_product ?></h5>
                            <p class="card-price"><?= $harga ?></p>
                            <span class="action-card">
                                <a href="../../view/detail/index.php?id=<?=$id?>" name="detail" class="btn-card-action">Order Now</a>
                                <i class="bi bi-heart heart"></i>
                            </span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="../../assets/images/banner-1.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="../../assets/images/banner-2.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="../../assets/images/banner-3.png" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <?php include '../template/footer.php' ?>
        </div>
    </div>
    <script src="../../script/script.js"></script>
</body>

</html>