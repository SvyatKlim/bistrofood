<?php require_once ACCOUNT_PARTS_DIR . '/header.php'; ?>
    <section class="d-flex-column " style="padding: 10rem 0">
        <div class="container">
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <h3>Order #<?= $order['id'] ?></h3>
                    <table class="table table-string-columns admin-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Total</td>
                            <td><?= $order['total'] ?></td>
                        </tr>
                        <tr>
                            <td>Created At</td>
                            <td><?= $order['created_at'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <h3 class="mt-4">Products</h3>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $number => $item):
                            if (!is_array($item)) continue;
                            $parentNumber = $number + 1;
                            ?>
                            <tr>
                                <td class="col-1"><?= $parentNumber ?></td>
                                <td class="col-3"><?= $item['name'] ?></td>
                                <td class="col-2"><?= $item['single_price'] ?>$</td>
                                <td class="col-1"><?= $item['quantity'] ?></td>
                                <td class="col-2"><?= $item['single_price'] * $item['quantity'] ?>$</td>
                            </tr>
                            <?php
                            $additions = json_decode($item['additions'],true);
                            if (!empty($additions)):
                            foreach ($additions as $addition):
                                ?>
                                <tr class="">
                                    <td class="col-1 ps-4">-</td>
                                    <td class="col-3"><?= $addition['name']; ?></td>
                                    <td class="col-2"><?= $addition['price']; ?>$</td>
                                    <td class="col-1"><?= $addition['quantity']; ?></td>
                                    <td class="col-2"><?= $addition['total']; ?>$</td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
<?php require_once ACCOUNT_PARTS_DIR . '/footer.php'; ?>