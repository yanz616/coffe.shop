<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "coffeshop";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "koneksi Gagal";
    die("Koneksi gagal");
}

?>
<!-- // <?php

// $sql = "SELECT * FROM user ";
// $query = mysqli_query($db, $sql);

// if (mysqli_num_rows($query) > 0) {
//     while ($row = mysqli_fetch_object($query)) {
//         $data['status'] = 'ok';
//         $data['result'][] = $row;
//     }
// } else {
//     $data['status'] = '400';
//     $data['result'][] = "Data belum ada";
// }

// print_r(json_encode($data));
// ?> -->