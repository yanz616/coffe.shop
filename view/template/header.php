<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

if ($action == "logout") {
    session_start();
    session_unset();
    session_destroy();

    header("location: ../../view/auth/login/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.0/dist/sweetalert2.min.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning-subtle" data-bs-theme="dark" style="height: 80px;">
        <div class="container-fluid ps-3 pe-4">
            <span class="navbar-brand mb-0 fs-3 fw-bolder">Dashboard</span>

            <ul class="navbar-nav ms-auto ">
                <li class="nav-item me-2 my-1">
                    <a class="btn btn-lg btn-warning fw-bolder" href="#">Profil</a>
                </li>
                <li class="nav-item me-2 my-1">
                    <a class="btn btn-lg  btn-warning fw-bolder" href="?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="d-flex flex-nowrap bg-body-secondary" style="min-height: calc(100vh - 80px);">

        <div class="container-fluid d-flex flex-column p-0 m-0" style="display: flex;">
            <div class="content-header p-3">

            </div>
            <div class="content-body mb-3 pt-4 px-3">