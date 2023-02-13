<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$editMode = false;
if ($_SERVER['REDIRECT_URL'] === '/admin/products/edit') {
    extract(formSessionData('edit_product'));
    $editMode = true;
    $id = str_replace('id=', '', $_SERVER['QUERY_STRING']);
    $fields = includeProductForEdit($id)[0];
} else {
    extract(formSessionData('create_product'));
}
?>
    <div class="container admin-form" style="padding: 10rem 0">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header text-center"><h3><?= $editMode ? 'Edit Product' : 'Create Product'; ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type"
                                   value="><?= $editMode ? 'edit_product' : 'create_product'; ?>">
                            <input name="MAX_FILE_SIZE" value="1048576" type="hidden"/>
                            <?php if ($editMode) : ?>
                                <input name="id" value="<?= (int)$id ?>" type="hidden"/>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                       id="name"
                                       value="<?= $fields['name'] ?? '' ?>"
                                />
                            </div>
                            <?= formError($errors['name'] ?? null) ?>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_main" value="1" role="switch"
                                       id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Is main product?</label>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control"
                                          rows="5"><?= $fields['description'] ?? '' ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" min="0" step="1" name="quantity" class="form-control"
                                       id="quantity"
                                       value="<?= $fields['quantity'] ?? 1 ?>"
                                />
                            </div>
                            <?= formError($errors['quantity'] ?? null) ?>

                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" min="0.1" step="0.1" name="price" class="form-control"
                                       id="price"
                                       value="<?= $fields['price'] ?? 0.1 ?>"
                                />
                            </div>
                            <?= formError($errors['price'] ?? null) ?>

                            <div class="mb-3">
                                <input class="form-control" type="file" name="image" value="" required id="formFile"
                                       accept="image/jpeg, image/png, image/jpg">
                                <output></output>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary"><?= $editMode ? 'Update' : 'Create'; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';