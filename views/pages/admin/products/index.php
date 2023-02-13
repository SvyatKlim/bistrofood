<?php
require_once ADMIN_PARTS_DIR . '/header.php'; ?>
    <section class="d-flex-column " style="padding: 10rem 0">
        <div class="container">
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <h3>Main products</h3>
                    <?php showMainProductsTable(); ?>
                    <hr class="mt-3 mb-3">
                    <h3>Additional Products</h3>
                    <?php showAdditionalProductsTable(); ?>
                </div>
            </div>
        </div>
    </section>
<?php require_once ADMIN_PARTS_DIR . '/footer.php';
