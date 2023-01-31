<?php require_once ADMIN_PARTS_DIR . '/header.php';
extract(formSessionData('create_product')); ?>
    <div class="container pt-after-header">
        <div class="row m-5">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Create Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="POST" class="form">
                            <input type="hidden" name="type" value="creat_product">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_main" value="1" role="switch" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Is main product?</label>
                            </div>
                            <div class="input-group mb-3">
                                <label class="label" for="name">Title</label>
                                <input class="input--style-4" type="text" name="name" id="name"
                                       value="<?= $fields['name'] ?? ''; ?>">
                            </div>
                            <?= formError($errors['name'] ?? null) ?>
                            <div class="input-group mb-3">
                                <textarea name="description" id="description" rows="5" class="textarea">
                                    <?= $fields['description'] ?? ''; ?>
                                </textarea>
                            </div>
                            <div class="input-group mb-3">
                                <label class="quantity" for="name">Quantity</label>
                                <input class="input--style-4" type="number" min="0" step="0.1" name="quantity" id="quantity"
                                       value="<?= $fields['quantity'] ?? 1; ?>">
                            </div>
                            <?= formError($errors['quantity'] ?? null) ?>
                            <div class="input-group mb-3">
                                <label class="price" for="name">Price</label>
                                <input class="input--style-4" type="number" min="0.1" step="0.1" name="price" id="price"
                                       value="<?= $fields['price'] ?? 0.1; ?>">
                            </div>
                            <?= formError($errors['price'] ?? null) ?>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once ADMIN_PARTS_DIR . '/footer.php'; ?>