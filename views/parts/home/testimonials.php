<section class="testimonials pt-after-header pb-100 overflow-visible">
    <div class="bg-absolute z-index-1">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>tree-bg-2560.jpg" type="image/jpg">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>tree-bg-1920.jpg" type="image/jpg">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>tree-bg-1440.jpg" type="image/jpg">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>tree-bg-tablet.jpg" type="image/jpg">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>tree-bg-mob.jpg" type="image/jpg">
            <img src="<?= IMAGES_URI; ?>tree-bg-mob.jpg" alt="Tree background">
        </picture>
    </div>
    <div class="decor-bottom testimonials__decor--top z-index-2">
        <picture>
            <source media="(min-width:1921px)" srcset="<?= IMAGES_URI; ?>forest-decor-2560.png"
                    type="image/png">
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>forest-decor-1920.png"
                    type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>forest-decor-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>forest-decor-tablet.png"
                    type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>forest-decor-mobile.png"
                    type="image/png">
            <img src="<?= IMAGES_URI; ?>forest-decor-mobile.png" alt="Decor">
        </picture>
    </div>
    <div class="container z-index-2 d-flex-column-center">
        <div class="col-xxl-4">
            <h2 class="title text-white fst-italic text-center"> <?= $reviews['subtitle'] ?? ''; ?></h2>
            <p class="text-white text-center mt-2">
                <?= $reviews['description'] ?? ''; ?>
            </p>
            <picture class="d-flex title-decor justify-content-center align-items-center">
                <img src="<?= IMAGES_URI; ?>title-decor.png" alt="Decor">
            </picture>
        </div>
        <?php if (!empty($reviews['slider'])) : ?>
            <div class="swiper testimonials__items js-testimonials-slider mt-5">
                <div class="swiper-wrapper ">
                    <?php
                    $pattern_id = 0;  // Це потрібно щоб не злітали картинки у свг масці
                    foreach ($reviews['slider'] as $slide) :
                        ?>
                        <div class="swiper-slide d-flex-column-center">
                            <div class="testimonials__item">
                                <h4 class="text-white text-center">
                                    <?= $slide['text'] ?? ''; ?>
                                </h4>
                                <div class="testimonials__item__customer d-flex-column-center">
                                    <div class="img d-flex">
                                        <svg width="103" height="103" viewBox="0 0 103 103" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <mask id="mask0_65_1<?= $pattern_id; ?>" style="mask-type:alpha" maskUnits="userSpaceOnUse"
                                                  x="0"
                                                  y="0" width="103" height="103">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M102.317 46.084C101.968 47.132 102.041 48.1502 102.536 49.1382L91.03 83.699C90.043 84.194 89.374 84.9652 89.025 86.0132L56.451 102.316C55.403 101.968 54.385 102.04 53.397 102.534L18.836 91.0291C18.341 90.0411 17.57 89.3732 16.522 89.0242L0.218994 56.4502C0.567994 55.4022 0.495 54.384 0 53.396L11.506 18.8352C12.493 18.3402 13.162 17.569 13.511 16.521L46.085 0.218018C47.133 0.566018 48.151 0.494 49.139 0L83.7 11.5051C84.195 12.4921 84.966 13.161 86.014 13.51L102.317 46.084Z"
                                                      fill="#FFFCE4"/>
                                            </mask>
                                            <g mask="url(#mask0_65_1<?= $pattern_id; ?>)">
                                                <rect x="-4" y="-3" width="109" height="109"
                                                      fill="url(#<?= 'pattern' . $pattern_id; ?>)"/>
                                            </g>
                                            <defs>
                                                <pattern id="<?= 'pattern' . $pattern_id; ?>"
                                                         patternContentUnits="objectBoundingBox" width="1"
                                                         height="1">
                                                    <use xlink:href="#image0_65_1<?= $pattern_id; ?>" transform="scale(0.00917431)"/>
                                                </pattern>
                                                <image id="image0_65_1<?= $pattern_id; ?>" width="109" height="109"
                                                       xlink:href="<?= IMAGES_URI . $slide['thumbnails_url']; ?>"/>
                                            </defs>
                                        </svg>
                                    </div>
                                    <h4 class="text-orange fw-bold mb-0 mt-3"><?= $slide['name'] ?? ''; ?></h4>
                                    <h5 class="text-white"><?= $slide['position'] ?? ''; ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $pattern_id++;
                    endforeach; ?>
                </div>
                <div class="swiper-pagination js-testimonials-slider-pagination"></div>
                <div class="swiper-button-next">

                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M23.12,9.91,19.25,6a1,1,0,0,0-1.42,0h0a1,1,0,0,0,0,1.41L21.39,11H1a1,1,0,0,0-1,1H0a1,1,0,0,0,1,1H21.45l-3.62,3.61a1,1,0,0,0,0,1.42h0a1,1,0,0,0,1.42,0l3.87-3.88A3,3,0,0,0,23.12,9.91Z"
                              fill="#E1753B"/>
                    </svg>

                </div>
                <div class="swiper-button-prev">

                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24" height="24">
                        <path d="M23.12,9.91,19.25,6a1,1,0,0,0-1.42,0h0a1,1,0,0,0,0,1.41L21.39,11H1a1,1,0,0,0-1,1H0a1,1,0,0,0,1,1H21.45l-3.62,3.61a1,1,0,0,0,0,1.42h0a1,1,0,0,0,1.42,0l3.87-3.88A3,3,0,0,0,23.12,9.91Z"
                              fill="#E1753B"/>
                    </svg>

                </div>
            </div>
        <?php endif; ?>
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