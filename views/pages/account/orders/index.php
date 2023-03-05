<?php require_once ACCOUNT_PARTS_DIR . '/header.php'; ?>
<section class="d-flex-column " style="padding: 10rem 0">
    <div class="container">
        <div class="row ">
            <div class="offset-md-2 col-md-8">
                <h3>My orders</h3>
                <table class="table table-string-columns admin-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                            <td>
                                <a href="/account/orders/<?= $order['id'] ?>"> Order #<?= $order['id'] ?></a>
                            </td>
                            <td><?= $order['created_at'] ?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php require_once ACCOUNT_PARTS_DIR . '/footer.php'; ?>

<!--<form action="/" method="POST">-->
<!--    <input type="hidden" name="type" value="remove_product">-->
<!--    <input type="hidden" name="product_id" value="--><?//= $product['id'] ?><!--">-->
<!--    <div class="btn-group">-->
<!--        <a class="btn admin-product-btn btn-info" href="/admin/products/edit?id=--><?//= $product['id'] ?><!--">-->
<!--            --><?//= file_get_contents(SVG_URI . '/edit.svg') ?>
<!--        </a>-->
<!--        <button type="submit"-->
<!--                class="btn admin-product-btn btn-danger">--><?//= file_get_contents(SVG_URI . '/delete.svg') ?><!--</button>-->
<!--    </div>-->
<!--</form>-->