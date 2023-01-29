<section class="products pt-after-header pb-80 overflow-visible z-index-3">
    <div class="about__bg bg-absolute z-index-1">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>tree-bg-2560.jpg" type="image/jpg">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>tree-bg-1920.jpg" type="image/jpg">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>tree-bg-1440.jpg" type="image/jpg">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>tree-bg-tablet.jpg" type="image/jpg">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>tree-bg-mob.jpg" type="image/jpg">
            <img src="<?= IMAGES_URI; ?>tree-bg-mob.jpg" alt="Tree background">
        </picture>
    </div>
    <div class="decor-top z-index-2">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>intro-decor-2560.png" type="image/png">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>intro-decor-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>intro-decor-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>intro-decor-1024.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>intro-decor-mob.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>intro-decor-mob.png" alt="Decor">
        </picture>
    </div>
    <div class="decor-bottom products__decor">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>intro-decor-2560.png" type="image/png">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>intro-decor-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>intro-decor-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>intro-decor-1024.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>intro-decor-mob.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>intro-decor-mob.png" alt="Decor">
        </picture>
    </div>
    <div class="container-fluid products__wrapper">
        <div class="container z-index-2 pt-60 d-flex-column-center">
            <div class="col-xxl-4">
                <h2 class="title text-white fst-italic text-center"><?= $products['title'] ?? ''; ?></h2>
                <p class="text-white text-center mt-4">
                    <?= $products['description'] ?? ''; ?>
                </p>
                <picture class="d-flex title-decor justify-content-center align-items-center">
                    <img src="<?= IMAGES_URI; ?>title-decor.png" alt="Decor">
                </picture>
            </div>


            <div class="row products__items">
                <?php if (!empty($products['product'])): ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                        <?php foreach ($products['product'] as $product) : ?>
                            <div class="col p-0">
                                <a href="<?= $product['link_to_product'] ?? '#'; ?>"
                                   class="product d-flex-column-center" target="_blank">
                                    <div class="product__img">
                                        <picture class="d-flex">
                                            <img src="<?= IMAGES_URI . $product['image']['url']; ?>"
                                                 alt="<?= $product['title'] ?? ''; ?>"
                                                 type="<?= $product['image']['image_type'] ?>">
                                        </picture>
                                    </div>

                                    <div class="product__content">
                                        <div class="d-flex-column-center mb-3 text-center">
                                            <h4 class="mb-2 text-truncate-line-2 ">
                                                <?= $product['title'] ?? ''; ?>
                                            </h4>
                                            <h2 class="text-orange ff-lato">
                                                <?= $product['price'] ?? ''; ?>
                                            </h2>
                                            <p><?= $product['description'] ?? ''; ?> </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif;
                if (!empty($products['button'])) :
                ?>
                <div class="col d-flex-column-center mt-5">
                    <a href="<?= $products['button']['url'] ?? DOMAIN ?>" class="btn"><?= $products['button']['text'] ?? 'View Menu' ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
