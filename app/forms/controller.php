<?php
if (requestToken()) {
    match (getRequestType()) {
        'create_product' => createProduct(createProductParams()),
        'remove_product' => removeProduct(idProductParams()),
        'edit_product' => editProduct(updateProductParams()),
        'add_to_cart' => addToCart(addToCartParams()),
        'remove_cart_item' => removeCartItem(removeCartItemParams()),
        'create_order' => createOrder(),
        'edit_content' => editContent(),
    };
} else {
    match (getRequestType()) {
        'registration' => createUserHandler(createUserParams()),
        'login' => authUserHandler(loginUserParams()),
        default => redirect()
    };
}