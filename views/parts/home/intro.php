<section class="intro vh-100 vw-100">
    <div class="swiper-container js-intro-slider h-100 w-100">
        <!--            https://codepen.io/simranthapa/pen/eYmjYYw-->
        <div class="swiper-wrapper">
            <?php foreach ($banner['banner_slider'] as $row) : ?>
                <?php debug_dump($row) ?>
                <div class="swiper-slide d-flex-column justify-content-center h-100">
                    <div class="container intro__slide__content d-flex-column-center text-center">
                        <?php if (!empty($row['subtitle'])): ?>
                            <h3 class="intro__slide__subtitle fst-italic text-white"><?= $row['subtitle']; ?></h3>
                        <?php endif; ?>
                        <?php if (!empty($row['title']) && $row['description']): ?>
                            <h2 class="h1 intro__slide__title text-white"><?= $row['title']; ?></h2>
                            <p class="text-white w-75 intro__slide__text mb-5">
                                <?= $row['description']; ?>
                            </p>
                        <?php endif; ?>
                        <!--   // Тут я не зрозумів чому саме ми створюємо banner-action , усе одно ми її виводимо тілки у цьому блоці за допомогою foreach-->
                        <?php if (!empty($row['button'])): ?>
                            <a href="<?= $row['button']['url']; ?>" class="btn"><?= $row['button']['name']; ?></a>
                        <?php endif; ?>
                        <!--                    //-->
                    </div>
                    <?php if (!empty($row['image'] && $row['image']['source'])): ?>
                        <picture class="intro__slide__image">
                            <?php showImageSrc($row['image']['image_type'], $row['image']['source']); ?>
                            <img src="<?= IMAGES_URI . $row['image']['source']['mobile'] ?>"
                                 alt="<?= $row['image']['alt']; ?>">
                        </picture>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div class="decor-bottom">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>intro-decor-2560.png" type="image/png">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>intro-decor-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>intro-decor-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>intro-decor-1024.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>intro-decor-mob.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>intro-decor-mob.png" alt="Decor">
        </picture>
    </div>

</section>