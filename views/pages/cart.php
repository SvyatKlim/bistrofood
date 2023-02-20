<?php
require PARTS_DIR . '/header.php';
$cart = getCartItems();
?>
    <section class="pt-after-header">
        <div class="container">
            <row class="d-flex align-items-center">
                <div class="col-2"></div>
                <div class="col-8">
                    <h2 class="text-center p-3 mt-4 mb-4">Cart</h2>
                    <?php if (!empty($cart)) { ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cart as $number => $item):
                                    if (!is_array($item)) continue;
                                    $parentNumber = $number + 1;
                                    ?>
                                    <tr>
                                        <td class="col-1"><?= $parentNumber; ?></td>
                                        <td class="col-3"><?= $item['name']; ?></td>
                                        <td class="col-2"><?= $item['price']; ?>$</td>
                                        <td class="col-1"><?= $item['quantity']; ?></td>
                                        <td class="col-2"><?= $item['total']; ?>$</td>
                                        <td class="col-2">
                                            <form action="/" method="POST">
                                                <input type="hidden" name="type" value="remove_cart_item">
                                                <input type="hidden" name="product_key" value="<?= $number; ?>">
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php if (!empty($item['additions'])): ?>
                                    <?php foreach ($item['additions'] as $subNumber => $addition): ?>
                                        <tr class="">
                                            <td class="col-1 ps-4"><?= $parentNumber . '.' . ($subNumber + 1); ?></td>
                                            <td class="col-3"><?= $addition['name']; ?></td>
                                            <td class="col-2"><?= $addition['price']; ?>$</td>
                                            <td class="col-1"><?= $addition['quantity']; ?></td>
                                            <td class="col-2"><?= $addition['total']; ?>$</td>
                                            <td class="col-2">
                                                <form action="/" method="POST">
                                                    <input type="hidden" name="type" value="remove_cart_item">
                                                    <input type="hidden" name="product_key" value="<?= $number; ?>">
                                                    <input type="hidden" name="parent_key" value="<?= $subNumber; ?>">
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="cart__footer mt-5 d-flex flex-column align-items-end">
                                <h4> Total: <?= ($cart['total'] . '$') ?? '' ?></h4>
                            </div>
                            <div class="cart__submit d-flex flex-column align-items-center">
                            <?php if (isAuth()): ?>
                                <form action="/" method="POST">
                                    <input type="hidden" name="type" value="create_order">
                                    <button type="submit" class="btn btn-success"> Create Order </button>
                                </form>
                            <?php else : ?>
                                <h4 class="mt-4">You're not logged in</h4>
                                <p>Please sign in for create order</p>
                                <a class="btn mt-2" href="<?= getHomeUrl() . '/login'; ?>"> Log in</a>
                            <?php endif; ?>
                            </div>
                        </div>
                    <?php } else {
                        ?>
                        <h2 class="text-center">Please add product to cart.
                        </h2>
                        <a class="btn m-auto mt-3" href="<?= getHomeUrl() . '/#catalog'; ?>"> Go to Menu</a
                    <?php } ?>
                </div>
            </row>
        </div>
    </section>
<?php require PARTS_DIR . '/footer.php'; ?>