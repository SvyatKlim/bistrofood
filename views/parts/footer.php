<?php
$footer = $mainFields['footer']['info'] ?? [];
$newsletter = $mainFields['footer']['newsletter'] ?? [];
?>
</main>

<?php if (!empty($footer)): ?>
    <footer class=" footer text-white text-center text-lg-start bg-dark position-relative">
        <div class="decor-top footer__decor ">
            <picture>
                <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>intro-decor-2560.png" type="image/png">
                <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>intro-decor-1920.png" type="image/png">
                <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>intro-decor-1440.png" type="image/png">
                <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>intro-decor-1024.png" type="image/png">
                <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>intro-decor-mob.png" type="image/png">
                <img src="<?= IMAGES_URI; ?>intro-decor-mob.png" alt="Decor">
            </picture>
        </div>

        <?php if (!empty($newsletter)) : ?>
            <div class="container p-4 my-5 pb-60 pt-100 ">
                <!-- Section: Form -->
                <section class="newsletter position-relative col-md-10 m-auto" style="background: url('<?= IMAGES_URI; ?>newsletter-bg.png') no-repeat; background-size: cover;">
                    <form class="form position-relative z-index-2" action="">
                        <!--Grid row-->
                        <div class="row d-flex align-items-center ms-5 me-5">
                            <!--Grid column-->
                            <div class="col-auto me-auto">
                                <h3 class="text-white"><?= $newsletter['title']; ?></h3>
                                <p class="pt-2 text-white-50">
                                   <?= $newsletter['subtitle']; ?>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-4 col-12">
                                <!-- Email input -->
                                <div class="form-outline ">
                                    <input type="email" id="email-field"
                                           placeholder="<?= $newsletter['field_placeholder']; ?>"
                                           class="form-control newsletter__email"/>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 col-12">
                                <!-- Submit button -->
                                <button type="submit" class="btn">
                                    <?= $newsletter['button_text']; ?>
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>
                <!-- Section: Form -->
            </div>
        <?php endif; ?>

        <!-- Grid container -->
        <div class="container p-4 z-index-2 position-relative">
            <!--Grid row-->
            <div class="row mt-4 justify-content-between">
                <!--Grid column-->
                <?php if (!empty($footer['contacts'])) : ?>
                    <div class="col-lg-2 col-md-12 mb-4 mb-md-0 text-white">
                        <h5 class="text-uppercase text-white mb-4"><?= $footer['contacts']['title']; ?></h5>

                        <p>
                            <?= $footer['contacts']['address']; ?>
                        </p>

                        <p>
                            <?= $footer['contacts']['phone']; ?>
                        </p>
                    </div>
                    <!--Grid column-->
                <?php endif;
                if (!empty($footer['working_hours'])) : ?>
                    <!--Grid column-->
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-white mb-4"> <?= $footer['working_hours']['title']; ?></h5>

                        <table class="table text-center text-white">
                            <tbody class="fw-normal d-flex">
                            <?php foreach ($footer['working_hours'] as $row) {
                                if (is_array($row)) { ?>
                                    <tr class="d-flex-column footer-working-hours">
                                        <td class="p-0 mb-3 text-start fs-6"><?= $row['name']; ?></td>
                                        <td class="p text-orange text-uppercase fw-bold p-0"><?= $row['hours']; ?></td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--Grid column-->
                <?php endif ?>

                <!--Grid row-->

                <?php if (!empty($socials)) : ?>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0 header__socials">
                        <h5 class="text-uppercase text-white mb-4"> <?= $socials['title']; ?></h5>

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
        <!-- Grid container -->
        <?php if (!empty($footer['copyright'])) : ?>
            <!-- Copyright -->
            <div class="text-center text-white p-3 z-index-2 position-relative" style="background-color: rgba(0, 0, 0, 0.2);">
                <?= $footer['copyright'] ?>
            </div>
            <!-- Copyright -->
        <?php endif ?>
    </footer>
<?php endif ?>

<?php include_once PARTS_DIR . "/modals/buy_product.php"; ?>

<script src="<?= ASSETS_URI ?>/vendor/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URI ?>/js/scripts.min.js"></script>
</body>
</html>