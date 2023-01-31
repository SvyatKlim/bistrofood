<?php
$nav = $mainFields['navigation'];
$socials = $mainFields['social'];
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
</head>
<body>
<header class="header fixed-top">
    <nav class="navbar navbar-dark" aria-label="First navbar example">
        <div class="container">
            <button class="navbar-toggler header__navbar-btn collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample01"
                    aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <?php if (!empty($mainFields['navigation']['logo'])): ?>
                <a class="navbar-brand custom-logo-link" href="#">
                    <img src="<?= IMAGES_URI . $mainFields['navigation']['logo']; ?>" alt="logo">
                </a>
            <?php endif;
            if (!empty($socials)) : ?>
                <div class="col-md-3 d-flex header__socials">
                    <ul class="social-network d-flex align-items-center gap-3">
                        <?php if (!empty($socials['social_links'])) {
                            foreach ($socials['social_links'] as $link) : ?>
                                <li class="d-flex">
                                    <a href="<?= $link['url']; ?>" class="social-network__icon" title="Twitter">
                                        <?= file_get_contents(SVG_URI . $link['icon']) ?>
                                    </a>
                                </li>
                            <?php endforeach;
                        } ?>
                    </ul>
                </div>
            <?php endif;
            if (!empty($mainFields['navigation']['links'])): ?>
                <div class="collapse navbar-collapse pt-30" id="navbarsExample01">
                    <ul class="navbar-nav me-auto mb-2 flex-row gap-3">
                        <?php
                        $ariaCurrent = '';
                        $template = '
                                <li class="nav-item col">
                                    <a class="nav-link active" href="%s">%s</a>
                                </li>';
                        foreach ($mainFields['navigation']['links'] as $link) {
                            echo sprintf($template, $link['hash'], $link['title']);
                        } ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(!isAuth()): ?>
            <div class="login">
                <a class="nav-link " href="/login">Sign In</a>
                <a class="nav-link " href="/registration">Sign Up</a>
            </div>
            <?php else: ?>
                <div class="logout">
                    <a class="nav-link " href="/logout">Log Out</a>
                </div>
            <?php endif;?>
        </div>
    </nav>
</header>
<main>