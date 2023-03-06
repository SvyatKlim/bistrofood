<?php
$additions = dbSelect(Tables::Products, columns: 'id, name, quantity, price', condition: 'is_main = FALSE AND quantity > 0', order: 'price');
?>


<div class="modal fade" id="buyProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/" method="POST" id="buyForm">
                <input type="hidden" name="type" value="add_to_cart">
                <input type="hidden" name="product_id" id="productIdField">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row product-row__header">
                            <div class="col-6 col-md-4 d-flex align-items-center"><b>Product name</b></div>
                            <div class="col-6 col-md-3 d-flex align-items-center"><b>Single price</b></div>
                            <div class="col-6 col-md-3 d-flex align-items-center"><b>Quantity</b></div>
                            <div class="col-6 col-md-2 d-flex align-items-center"><b>Total</b></div>
                        </div>
                        <hr>
                        <div class="row product-row__body">
                            <div class="col-6 col-md-4 d-flex align-items-center js-product-name"></div>
                            <div class="col-6 col-md-3 d-flex align-items-center js-product-price"></div>
                            <div class="col-6 col-md-3 d-flex align-items-center ">
                                <input type="number" name="quantity"
                                       class="js-product-quantity quantity-field form-control" min="1" value="1">
                            </div>
                            <div class="col-6 col-md-2 d-flex align-items-center js-product-total"></div>
                        </div>
                        <div class="row pt-3 flex-column flex-md-row">
                            <h4>Additional products :</h4>
                            <?php foreach ($additions as $product) : ?>
                                <div class="additional-item col-md-4">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label h6"
                                               for="additional-<?= $product['id']; ?>">
                                            <?= $product['name'] ?>
                                        </label>
                                        <input type="checkbox"
                                               class="form-check-input additional-toggle"
                                               role="switch"
                                               name="additions[]"
                                               value="<?= $product['id']; ?>"
                                               id="additional-<?= $product['id']; ?>"
                                               >
                                    </div>
                                    <div class="input-group mb-3">

                                        <div class="input-group-text">
                                            <span class="additional-price"><?= $product['price'] ?></span>$
                                        </div>
                                        <input type="number" disabled class="form-control additional-qty additional-qty-id-<?= $product['id']; ?>"
                                               aria-label="Amount(to the nearest dollar)" name="additions_qty[]" min="1"
                                               value=""
                                               max="<?= $product['quantity']; ?>">
                                        <span class="input-group-text additional-total"></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex flex-column align-items-end">
                    <h4 class="mb-2"> Total :  <span class="final-price">0</span>$</h4>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Buy</button>
                </div>
            </form>
        </div>
    </div>
</div>