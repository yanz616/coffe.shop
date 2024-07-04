<?php include "../../data/index.php";
$no = 1;
$urutan_pesanan = 1;
$message = "";
$op = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
}else{
    $op = "";
}
if ($op == "delete") {
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id = '$id'";
    $q = mysqli_query($db, $sql);
    if ($q) {
        $message = "Berhasil Dihapus";
    } else {
        $message = "Gagal Dihapus";
    }
}
if ($op == "delete") {
    $id = $_GET['id'];
    $sql = "DELETE FROM pesanan WHERE id = '$id'";
    $q = mysqli_query($db, $sql);
    if ($q) {
        $message = "Berhasil Dihapus";
    } else {
        $message = "Gagal Dihapus";
    }
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
    <?= include "../../view/template/header.php" ?>
    <div style="width: 100%;" class="card shadow-sm bg-white mb-2 ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bolder mb-3">Data Product</h5>
                </div>
                <div class="col-md-6 text-end">
                    <a href="../../view/insert/index.php" class="btn btn-success mb-3">Tambah</a>
                </div>
            </div>
            <table id="datatables" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-primary text-center">No</th>
                    
                        <th class="text-primary text-start">Nama Product</th>
                        <th class="text-primary text-start">harga</th>
                        <th class="text-primary text-start">stock</th>
                        <th class="text-primary text-start">deskripsi</th>
                        <th class="text-primary text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM product";
                    $q2 = mysqli_query($db, $sql2);
                    while ($r1 = mysqli_fetch_array($q2)) {
                        $id = $r1['id'];
                        $nama_product = $r1['nama_product'];
                        $harga = $r1['harga'];
                        $deskripsi = $r1['desk'];
                        $stock = $r1['stock'];
                        ?>
                <tr>
                <th class="text-center" scope="row"><?= $no++ ?></th>
                        
                        <td class="text-start">
                        <?= $nama_product?>
                        </td>
                        <td class="text-start">
                        <?= $harga?>
                        </td>
                        <td class="text-start">
                            <?= $stock?>
                        </td>
                        <td class="text-start">
                        <?= $deskripsi?>
                        </td>
                        <td class="text-center">
                          <a href="../../view/update/index.php?op=edit&id=<?=$id?>" class="btn btn-sm btn-warning ">
                        <i class="bi bi-pencil-square">Edit</i>
                        </a>
                        <a href="index.php?op=delete&id=<?=$id?>" class="btn btn-sm btn-danger btn-hps">
                        <i class="bi bi-trash">Hapus</i>
                        </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div style="width: 100%;" class="card shadow-sm bg-white mb-2 ">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title fw-bolder mb-3">Data Pesanan</h5>
                </div>
            </div>
            <table id="datatables" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-primary text-center">No</th>
                        <th class="text-primary text-start">Nama Product</th>
                        <th class="text-primary text-start">harga</th>
                        <th class="text-primary text-start">jumlah pesanan</th>
                 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql3 = "SELECT * FROM pesanan";
                    $q3 = mysqli_query($db, $sql3);
                    while ($r = mysqli_fetch_array($q3)) {
                        $id = $r['id'];
                        $nama_product = $r['nama_product'];
                        $harga = $r['harga'];
                        $jumlah =$r['jumlah'];
                        ?>
                <tr>
                <th class="text-center" scope="row"><?= $urutan_pesanan++ ?></th>
                        
                        <td class="text-start">
                        <?= $nama_product?>
                        </td>
                        <td class="text-start">
                        <?= $harga?>
                        </td>
                        <td class="text-start">
                        <?= $jumlah?>
                        </td>
                       
                        <td class="text-center">
                        <a href="index.php?op=delete&id=<?=$id?>" class="btn btn-sm btn-danger btn-hps">
                        <i class="bi bi-trash">Hapus</i>
                        </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>


</body>

</html>