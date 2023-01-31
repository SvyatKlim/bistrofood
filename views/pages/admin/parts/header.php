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
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/styles.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/admin.css">
</head>
<body>
<header class="header fixed-top">
    <nav class="navbar navbar-dark" aria-label="First navbar example">
        <div class="container">

            <?php if (!empty($mainFields['navigation']['logo'])): ?>
                <a class="navbar-brand custom-logo-link" href="#">
                    <img src="<?= IMAGES_URI . $mainFields['navigation']['logo']; ?>" alt="logo">
                </a>
            <?php endif; ?>
                <div class="logout">
                    <a class="nav-link " href="/">Back to Site</a>
                    <a class="nav-link " href="/logout">Log Out</a>
                </div>
            <div>
                <a class="nav-link " href="/admin/products">All Products</a>
                <a class="nav-link " href="/admin/products/create">Create Product</a>
            </div>
        </div>
    </nav>
</header>
<main>