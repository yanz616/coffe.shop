<?php 
include "../../data/index.php";
session_start();

$message = "";
$op = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == "edit" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = '$id'";
    $q = mysqli_query($db, $sql);
    $r = mysqli_fetch_array($q);
    $nama_product = $r['nama_product'];
    $harga = $r['harga'];
    $desk = $r['desk'];
    $gambar = $r['gambar'];
    $stock = $r['stock'];
}

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $nama_product = $_POST['nama_product'];
    $harga = $_POST['harga'];
    $desk = $_POST['desk'];
    $gambar = $_POST['gambar'];
    $stock = $_POST['stock'];

    $sql = "UPDATE product SET nama_product='$nama_product', harga='$harga', desk='$desk', gambar='$gambar', stock='$stock' WHERE id='$id'";
    $q = mysqli_query($db, $sql);

    if ($q) {
        $message = "Berhasil diupdate";
        header("location: ../../view/dashboard/index.php");
    } else {
        $message = "Gagal diupdate";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
</head>

<body>
    <i><?= $message ?></i>

    <?php include '../template/Header.php' ?>
    <div class="row">
        <div class="col-md-6 ms-3">
            <div class="card shadow-sm bg-white">
                <div class="card-body">
                    <h5 class="card-title fw-bolder mb-3">
                        Update Data
                    </h5>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama_product" class="form-label">Product</label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product" value="<?= $nama_product ?>">
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $harga ?>">
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="desk" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="desk" name="desk" value="<?= $desk ?>">
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="text" class="form-control" id="gambar" name="gambar" value="<?= $gambar ?>">
                            <p class="text-danger"></p>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="<?= $stock ?>">
                            <p class="text-danger"></p>
                        </div>
                        <div class="col-12">
                            <input type="submit" name="update" value="Update Data" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
