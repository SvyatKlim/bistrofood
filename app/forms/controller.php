<?php
//dd(getRequestType());
match (getRequestType()) {
    'registration' => createUserHandler(createUserParams()),
    'login' => authUserHandler(loginUserParams()),
    'create_product' => createProduct(createProductParams()),
    'remove_product' => removeProduct(idProductParams()),
    'edit_product' => editProduct(updateProductParams()),
    'add_to_cart' => addToCart(addToCartParams()),
    'remove_cart_item' => removeCartItem(removeCartItemParams()),
    'create_order' => createOrder(),
    default => redirect()
};