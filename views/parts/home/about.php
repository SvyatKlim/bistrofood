<section id="about-us" class="about pt-100 pb-80 overflow-visible">
    <div class="about__bg bg-absolute z-index-1">
        <picture>
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>white-bg-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>white-bg-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>white-bg-tablet.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>white-bg-mobile.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>white-bg-mobile.png" alt="White background">
        </picture>
    </div>
    <div class="container pt-60 pb-80 z-index-2">
        <div class="row">
            <div class="col-xxl-6">
                <p class="text-orange text-uppercase fw-bold"> <?= $about['subtitle'] ?? ''; ?></p>
                <h2 class="title fst-italic"><?= $about['title'] ?? ''; ?></h2>
                <p class="mb-5 mt-2">
                    <?= $about['description'] ?? ''; ?>
                </p>
                <?php if (!empty($about['button'])): ?>
                    <a href="<?= $about['button']['url']; ?>" class="btn"><?= $about['button']['text']; ?></a>
                <?php endif; ?>
            </div>
            <?php if (!empty($about['image'])) : ?>
                <div class="col-xxl-5 about__img">
                    <picture>
                        <img class="img-fluid" src="<?= IMAGES_URI . $about['image']['url']; ?>"
                             alt="<?= $about['image']['alt']; ?>">
                    </picture>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>