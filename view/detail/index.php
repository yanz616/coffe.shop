<?php 
include "../../data/index.php";
session_start();

if (!isset($_SESSION['quantity'])) {
    $_SESSION['quantity'] = 1;
}

$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id ='$id'";
    $q = mysqli_query($db, $sql);
    $r = mysqli_fetch_array($q);
    $nama_product = $r['nama_product'];
    $harga = $r['harga'];
    $deskripsi = $r['desk'];
    $gambar = $r['gambar'];
    $stock = $r['stock'];
}

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == "insert"){
    $id = $_GET['id'];
    $nama_product = $_POST['nama_product'];
    $harga = $_POST['harga'];
    $quantity = $_POST['quantity'];

    $sql3 = "INSERT INTO pesanan(nama_product, harga, jumlah) VALUES ('$nama_product', '$harga', '$quantity')";
    $q3 = mysqli_query($db, $sql3);
   
    if($q3) {
        $message = "Order berhasil";
    } else {
        $message = "gagal order";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/detail.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Product Detail</title>
</head>

<body>
    <div class="container">
        <div class="navigation" style="display:flex; align-items: center; justify-content: space-between; padding: 20px 40px;">
            <a href="../../view/homepage/index.php">
                <i class="bi bi-arrow-left" style="font-size: 2rem; color:black"></i>
            </a>
        </div>
        <div class="detail-product" style="height: calc(100vh - 110px); margin: 0 80px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <div style="display: flex; padding: 24px 32px; justify-content:space-between; gap:30px">
                
                <img src="<?= $gambar ?>" alt="error" height=430 style="padding-left: 100px ;">
                
                <div style="max-width: 600px; padding-top: 60px;">
                    <h1 class="product-title" style="font-size: 40px;"><?= $nama_product ?></h1>
                    <p class="product-desc" style="text-align: justify; padding: 30px 0; color:gray"><?= $deskripsi ?></p>
                    <p class="product-desc" style="font-size: 30px; font-weight: bold;"><?= $harga ?></p>
                    <div style="display: flex; gap:20px; margin-top: 12px;">
                        <button style="border: 2px solid #C49150; color:#C49150; border-radius: 6px;  background-color: white; padding:6px 20px">White Sugar</button>
                        <button style="border: 2px solid #C49150; color:white; background-color: #C49150; border-radius: 6px;  padding:6px 20px">Lose Sugar</button>
                    </div>
                    <div style="display: flex; gap:20px; margin-top: 20px;">
                        <a href="../../view/detail/updateQuantity.php?action=min&id=<?= $id ?>">
                            <button style="border: 2px solid #C49150; color:#C49150; border-radius: 6px;  background-color: white; padding:6px 20px; font-size: 20px;">-</button>
                        </a>
                        <p style="font-size: 30px; font-weight:bold"><?php echo $_SESSION['quantity'] ?></p>
                        <a href="../../view/detail/updateQuantity.php?action=add&id=<?= $id ?>">
                            <button style="border: 2px solid #C49150; color:#C49150; border-radius: 6px;  background-color: white; padding:6px 20px; font-size: 20px;">+</button>
                        </a>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-items:center; gap:20px">
                    <img src="../../assets/images/Logo.png" alt="err" height=80>
                    <i class="bi bi-heart"></i>
                </div>
            </div>
            <hr>
            <div style="display: flex; justify-content:space-between; padding: 20px 40px">
                <div style="padding: 0 140px; display: flex; gap: 12px;">
                    <img src="../../assets/images/coffee-product.png" alt="err" height=150>
                    <img src="../../assets/images/coffee-product.png" alt="err" height=150>
                </div>

                <div style="display: flex; gap:20px; margin-top: 12px; align-items: end;">
                    <form method="POST" action="../../view/detail/index.php?op=insert&id=<?= $id ?>">
                        <input type="hidden" name="nama_product" value="<?= $nama_product ?>">
                        <input type="hidden" name="harga" value="<?= $harga ?>">
                        <input type="hidden" name="quantity" value="<?php echo $_SESSION['quantity'] ?>">
                        <i><?= $message ?></i>
                        <button type="submit" style="border: 2px solid #C49150; color:white; background-color: #C49150; border-radius: 6px; padding:12px 60px; font-weight:bold; font-size:18px">Order Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../script/script.js"></script>
</body>

</html>
