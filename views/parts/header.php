<?php
$nav = $mainFields['navigation'];
$socials = $mainFields['social'];
$cartIcon = file_get_contents(SVG_URI . 'cart.svg');

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
<body class="<?= getUrl() === "" ? 'home' : ''?>">
<?php include PARTS_DIR . '/notification.php'?>
<header class="header fixed-top">
    <nav class="navbar navbar-dark" aria-label="First navbar example">
        <div class="container-fluid ms-5 me-5">
            <div class="col-4">
            <button class="navbar-toggler header__navbar-btn collapsed" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

            <?php if (!empty($mainFields['navigation']['logo'])): ?>
                <a class="navbar-brand custom-logo-link col-4" href="/">
                    <img src="<?= IMAGES_URI . $mainFields['navigation']['logo']; ?>" alt="logo">
                </a>
            <?php endif; ?>

            <div class="navbar__inner d-flex col-4">
                <a href="<?= getHomeUrl() . '/cart'; ?>" class="cart-link js-cart-icon d-flex align-items-center nav-link">
                    <span class="me-2">Cart</span>  <?= $cartIcon;?>
                </a>
                <?php if (isAdmin()) : ?>
                <div class="admin d-flex align-items-center mb-0 me-2">
                    <a class="nav-link h5 mb-0" href="admin/dashboard">Dashboard</a>
                </div>
                <?php endif; if (!isAuth()): ?>
                    <div class="login d-flex align-items-center mb-0 me-2">
                        <a class="nav-link h5 mb-0" href="/login">Sign In</a>
                        <span class="text-white" > | </span>
                        <a class="nav-link h5 mb-0" href="/registration">Sign Up</a>
                    </div>
                <?php else: ?>
                    <div class="logout d-flex align-items-center mb-0 me-2">
                        <a class="nav-link h5 mb-0" href="/logout">Log Out</a>
                    </div>

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
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header d-flex justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-after-header">
        <?php if (!empty($mainFields['navigation']['links'])): ?>
            <ul class="me-auto mb-2 flex-column gap-3 justify-content-center ">
                <?php
                $isHome = !empty(getUrl());
                $ariaCurrent = '';
                $template = '';
                if (!$isHome){
                    $template = '
                                <li class="nav-item col">
                                    <a class="nav-link active h3" href="%s">%s</a>
                                </li>';
                }else{
                    $template = '
                                <li class="nav-item col">
                                    <a class="nav-link active h3" href="/%s">%s</a>
                                </li>';
                }

                foreach ($mainFields['navigation']['links'] as $link) {
                    echo sprintf($template, $link['hash'], $link['title']);
                } ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<main>