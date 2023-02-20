<table class="table table-string-columns admin-table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $number => $product) : ?>
        <tr>
            <td><?= $number + 1 ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="remove_product">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <div class="btn-group">
                        <a class="btn admin-product-btn btn-info" href="/admin/products/edit?id=<?= $product['id'] ?>">
                            <?= file_get_contents(SVG_URI . '/edit.svg') ?>
                        </a>
                        <button type="submit"
                                class="btn admin-product-btn btn-danger"><?= file_get_contents(SVG_URI . '/delete.svg') ?></button>
                    </div>
                </form>
            </td>
            <?php
            if (!empty($product['image_url']) && URL_exists($product['image_url'])):?>
            <td>
                <div class="text-center">
                    <img src="<?= $product['image_url']; ?>" class="rounded img-thumbnail" alt="Image" style="width: 150px;height: 150px">
                </div>
            </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
//if ($count) :
//    $countOfLinks = calculatePagination($count, ADMIN_PRODUCTS_PER_PAGE);
//    ?>
<!--    <nav aria-label="Pagination">-->
<!--        <ul class="pagination">-->
<!--            --><?php //for ($i = 1; $i <= $countOfLinks; $i++) : ?>
<!--                <li class="page-item"><a class="page-link" href="/admin/products?page=--><?//= $i ?><!--">--><?//= $i ?><!--</a></li>-->
<!--            --><?php //endfor; ?>
<!--        </ul>-->
<!--    </nav>-->
<?php //endif; ?>
