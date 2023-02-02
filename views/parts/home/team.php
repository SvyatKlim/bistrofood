<section id="team" class="team z-index-1 pt-80">
    <div class="bg-absolute z-index-1">
        <picture>
            <source media="(min-width:1441px)" srcset="<?= IMAGES_URI; ?>white-bg-1920.png" type="image/png">
            <source media="(min-width:840px)" srcset="<?= IMAGES_URI; ?>white-bg-1440.png" type="image/png">
            <source media="(min-width:480px)" srcset="<?= IMAGES_URI; ?>white-bg-tablet.png" type="image/png">
            <source media="(min-width:300px)" srcset="<?= IMAGES_URI; ?>white-bg-mobile.png" type="image/png">
            <img src="<?= IMAGES_URI; ?>white-bg-mobile.png" alt="White background">
        </picture>
    </div>
    <div class="container pt-80 z-index-2">
        <div class="row">
            <div class="col-xxl-6">
                <p class="text-orange text-uppercase fw-bold"> <?= $team['subtitle'] ?? ''; ?> </p>
                <h2 class="title fst-italic"><?= $team['title'] ?? ''; ?> </h2>
                <p class="mb-4 mt-2">
                    <?= $team['description'] ?? ''; ?>
                </p>
                <h4 class="text-orange fw-bold mb-0"><?= $team['chief_name'] ?? 'Sara Peter'; ?></h4>
                <h5><?= $team['position'] ?? ''; ?></h5>
                <?php if (!empty($team['signature'])): ?>
                    <div class="d-flex mt-4">
                        <img class="w-auto" src="<?= IMAGES_URI . $team['signature']['url']; ?>"
                             alt="<?= $team['signature']['alt'] ?? ''; ?>"
                             type="<?= $team['signature']['image_type'] ?>">
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($team['chef_image'])): ?>
                <div class="col-xxl-5 team__img">
                    <picture>
                        <img class="img-fluid" src="<?= IMAGES_URI . $team['chef_image']['url']; ?>"
                             alt="<?= $team['chef_image']['alt'] ?? ''; ?>"
                             type="<?= $team['chef_image']['image_type'] ?>">
                    </picture>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="team__decor decor-bottom z-index-2">
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