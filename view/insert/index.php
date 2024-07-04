<?php include "../../data/index.php";

$nama_product = "";
$harga = "";
$desk = "";
$gambar = "";
$stock = "";
$message = "";

if(isset($_POST['simpan'])){
    $nama_product = $_POST['nama_product'];
    $harga = $_POST['harga'];
    $desk = $_POST['desk'];
    $gambar = $_POST['gambar'];
    $stock = $_POST['stock'];

    try{
        $sql = "INSERT INTO product(nama_product, harga, desk, gambar,stock) VALUES ('$nama_product',
    '$harga', '$desk', '$gambar', '$stock')";
    $q = mysqli_query($db,$sql);
    if($q){
        $message = "Berhasil mmenambah data";
        header("location: ../../view/dashboard/index.php");
    }else{
        $message = "Gagal Menambah Data";
    }
    }catch(mysqli_sql_exception){
        $message = "Data sudah ada";
    }
    $db->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <i><?=$message?></i>
    
    <?php include '../template/Header.php' ?>
<div class="row">
    <div class="col-md-6 ms-3">
        <div class="card shadow-sm bg-white">
            <div class="card-body">
                <h5 class="card-title fw-bolder mb-3">
                    Tambah Data
                </h5>
                <form action="../../view/insert/index.php" method="POST">
        <div class="mb-3">
            <label for="nama_product" class="form-label">product</label>
            <input type="text" class="form-control" id="nama_product" name="nama_product" value="<?php echo $nama_product ?>">
            <p class="text-danger"></p>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">harga</label>
            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
            <p class="text-danger"></p>
        </div>
        <div class="mb-3">
            <label for="desk" class="form-label">deskripsi</label>
            <input type="text" class="form-control" id="desk" name="desk" value="<?php echo $desk ?>">
            <p class="text-danger"></p>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">gambar</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar ?>">
            <p class="text-danger"></p>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">stock</label>
            <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $stock ?>">
            <p class="text-danger"></p>
        </div>
        </div>
        <div class="col-12">
            <input type="submit" name="simpan" value="simpan data" class="btn btn-primary">
        </div>

    </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>