<?php
$footer = $mainFields['footer']['info'] ?? [];
$newsletter = $mainFields['footer']['newsletter'] ?? [];

if (!empty($newsletter)) : ?>
    <div class="container p-4 my-5 pb-60 pt-100 ">
        <!-- Section: Form -->
        <section class="newsletter">
            <form class="form" action="">
                <!--Grid row-->
                <div class="row d-flex justify-content-center">
                    <!--Grid column-->
                    <div class="col-auto">
                        <h3><?= $newsletter['title']; ?></h3>
                        <p class="pt-2">
                            <strong><?= $newsletter['subtitle']; ?></strong>
                        </p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form5Example2"
                                   placeholder="<?= $newsletter['field_placeholder']; ?>"
                                   class="form-control"/>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-auto">
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary mb-4">
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
<?php endif;?>
</main>
<?php if (!empty($footer)): ?>
    <footer class="text-white text-center text-lg-start bg-dark">
        <!-- Grid container -->
        <div class="container-fluid p-4">
            <!--Grid row-->
            <div class="row mt-4">
                <!--Grid column-->
                <?php if (!empty($footer['contacts'])) : ?>
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0 text-white">
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
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase text-white mb-4"> <?= $footer['working_hours']['title']; ?></h5>

                        <table class="table text-center text-white">
                            <tbody class="fw-normal">
                            <?php foreach ($footer['working_hours'] as $row) {
                                if (is_array($row)) { ?>
                                    <tr>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['hours']; ?></td>
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
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0 header__socials">
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
            <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <?= $footer['copyright'] ?>
            </div>
            <!-- Copyright -->
        <?php endif ?>
    </footer>
<?php endif ?>
<script src="<?= ASSETS_URI ?>/js/scripts.min.js"></script>
</body>
</html>