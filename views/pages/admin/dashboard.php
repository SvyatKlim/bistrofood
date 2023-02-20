<?php require_once ADMIN_PARTS_DIR . '/header.php';
$order = dbSelect(Tables::Orders);
extract($order);
?>
    <section class="d-flex-column " style="padding: 10rem 0">
        <div class="container">
            <div class="row ">
                <div class="offset-md-2 col-md-8">
                    <h2 class="pb-2">Welcome to Admin Panel</h2>
                    <h3 class="pb-2">Last Order</h3>
                    <div class="d-flex ">
                        <p class="col-2">#</p>
                        <p class="col-2">Order ID</p>
                        <p class="col-2">User</p>
                        <p class="col-2">Total</p>
                        <p class="col-2">Created Date</p>
                        <p class="col-2">More Info</p>
                    </div>
                    <?php foreach ($order as $number => $item):
                        $user = getUserById($item['user_id']);
                        $order_product = dbSelect(Tables::OrderProducts, columns: 'product_id, quantity, single_price, additions', condition: " order_id = {$item['id']} ", order: 'single_price');
                        ?>
                        <hr>
                        <div class="d-flex ">
                            <div class="col-2"><?= $number + 1 ?></div>
                            <div class="col-2"><?= $item['id']; ?></div>
                            <div class="col-2"><?= $user['name']; ?></div>
                            <div class="col-2"><?= $item['total']; ?></div>
                            <div class="col-2"><?= $item['created_at']; ?></div>
                            <div class="col-2"><a class="btn btn-primary" data-bs-toggle="collapse" href="#info"
                                                  role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Link with href
                                </a></div>
                        </div>
                        <div class="collapse" id="info">
                            <?php foreach ($order_product as $product_order) :
                                $product = getProductById($product_order['product_id']);
                            $additions = json_decode($product_order['additions']);
                            ?>
                                <div class="card card-body d-flex flex-wrap flex-row">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name:</th>
                                            <th>ID:</th>
                                            <th>Quantity:</th>
                                            <th>Single Price:</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Main Product: <?= $product['name'] ?></td>
                                            <td><?= $product_order['product_id']; ?></td>
                                            <td><?= $product_order['quantity']; ?></td>
                                            <td><?= $product_order['single_price']; ?></td>
                                        </tr>
                                        <?php foreach ($additions as $addition) :?>
                                            <tr>
                                                <td>Additional: <?= $addition->name; ?></td>
                                                <td><?= $addition->product_id; ?></td>
                                                <td><?= $addition->quantity; ?></td>
                                                <td><?= $addition->price; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php require_once ADMIN_PARTS_DIR . '/footer.php'; ?>