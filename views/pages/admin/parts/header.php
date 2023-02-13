<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bistro Food website</title>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/styles.min.css">
</head>
<body>
<div class="main-wrapper">
    <?php include PARTS_DIR . '/notification.php' ?>
    <header class="header fixed-top">
        <nav class="navbar navbar-dark" aria-label="First navbar example">
            <div class="container d-flex col-12">

                <?php if (!empty($mainFields['navigation']['logo'])): ?>
                    <a class="navbar-brand custom-logo-link col-3" href="#">
                        <img src="<?= IMAGES_URI . $mainFields['navigation']['logo']; ?>" alt="logo">
                    </a>
                <?php endif; ?>
                <div class="d-flex col-8 justify-content-end">
                    <a class="nav-link " href="/">Back to Site</a>
                    <a class="nav-link " href="/admin/products">All Products</a>
                    <a class="nav-link " href="/admin/products/create">Create Product</a>
                </div>
                <div class="d-flex col-1">
                    <a class="nav-link " href="/logout">Log Out</a>
                </div>
            </div>
        </nav>
    </header>
    <main class="admin-panel">