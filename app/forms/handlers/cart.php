<?php
function addToCart(array $productData)
{
    $items = readCardFromCookie();
    $items = addOrCombineProduct(
        $items,
        checkProductAvailability($items, $productData)
    );

    $expire = time() + (60 * 60 * 24 * 10);

    setcookie('cart', json_encode($items), $expire);

    notify('Product was added to the cart');
    redirect();
}

function addOrCombineProduct(array $cartItems, array $addedProduct): array
{
    $sameItem = array_filter(
        $cartItems,
        fn($item) => $item['product_id'] === $addedProduct['product_id'] && empty($item['additions'])
    );

    if (!empty($addedProduct['additions']) || empty($sameItem)) {
        $cartItems[] = $addedProduct;
    } else {
        array_walk($cartItems, function(&$item, $key, $product) {
            if ($item['product_id'] === $product['product_id'] && empty($item['additions'])) {
                $item['quantity'] += $product['quantity'];
            }
        }, $addedProduct);
    }

    return $cartItems;
}

function checkProductAvailability(array $cartItems, array $addedProduct): array
{
    $dbProduct = dbFind(Tables::Products, $addedProduct['product_id']);
    $quantity = array_reduce(
        $cartItems,
        fn($sum, $item) => $item['product_id'] === $addedProduct['product_id'] ? $sum + $item['quantity'] : 0,
        0
    );
    $sum = $quantity + $addedProduct['quantity'];
    $addedProduct['quantity'] = $dbProduct['quantity'] < $sum ? ($dbProduct['quantity'] - $quantity) : $addedProduct['quantity'];

    if ($addedProduct['quantity'] === 0) {
        notify("The sum of '{$dbProduct['name']}' in the cart more than in stock" , 'danger');
        redirect();
    }

    return $addedProduct;
}

function updateCart(array $items)
{
    $expire = time() + (60 * 60 * 24 * 10);
    setcookie(
        'cart',
        json_encode(array_values($items)),
        $expire);
}

function getCartItems(): array
{
    $cart = readCardFromCookie();
    $cartItems = [];
    if (!empty($cart)) {
        $ids = mapProductIds($cart);
        $products = dbSelect(Tables::Products, condition: 'id IN (' . implode(',', $ids) . ')');
        $cartItems = prepareCartItems($cart, $products);
        $cartItems['total'] = calcTotal($cartItems);
    }
    return $cartItems;
}

function calcTotal($cart): float
{
    $total = 0;
    foreach ($cart as $cartItem) {
        if (!empty($cartItem['additions']) && is_array($cartItem['additions'])) {
            $cartItem['total'] += calcTotal($cartItem['additions']);
        }
        $total += $cartItem['total'];
    }
    return $total;
}

function prepareCartItems(array $cart, array $dbProducts): array
{
    return array_map(function ($item) use ($dbProducts) {
        $product = getProductDataFromDbArray($dbProducts, $item['product_id']);
        $item = array_merge($item, [
            'name' => $product['name'],
            'price' => $product['price'],
            'total' => $product['price'] * $item['quantity']
        ]);
        if (!empty($item['additions'])) {
            $item['additions'] = buildAdditionItem(
                $item['additions'],
                $item['additions_qty'],
                $dbProducts,
                $item['product_id']
            );
        } else {
            unset($item['additions']);
        }
        unset($item['additions_qty']);
        return $item;
    }, $cart);
}

function buildAdditionItem(array $additions, array $additionsQty, array $dbProducts, int $parentId)
{
    return array_map(function ($id, $quantity) use ($dbProducts, $parentId) {
        $product = getProductDataFromDbArray($dbProducts, $id);
        return [
            'product_id' => $id,
            'parent_id' => $parentId,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity,
            'total' => $product['price'] * $quantity,
        ];
    }, $additions, $additionsQty);
}

function getProductDataFromDbArray(array $dbProducts, int $productId): array|null
{
    $result = array_filter($dbProducts, fn($dbItem) => $dbItem['id'] === $productId);

    return array_shift($result);
}

function mapProductIds(array $cart): array
{
    $result = [];
    array_walk($cart, function ($item) use (&$result) {
        $ids = is_null($item['additions']) ? [$item['product_id']] : [$item['product_id'], ...$item['additions']];
        array_push($result, ...$ids);
    });
    return array_unique($result);
}

function readCardFromCookie(): array
{
    return isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], associative: true) : [];
}

function removeCartItem(array $fields)
{
    $cart = readCardFromCookie();

    if (isset($fields['parent_key'])) {
        extract($fields);
        unset($cart[$parent_key]['additions'][$product_key]);
        unset($cart[$parent_key]['additions_qty'][$product_key]);

        if (!empty($cart[$parent_key]['additions'])) {
            $cart[$parent_key]['additions'] = array_values($cart[$parent_key]['additions']);
            $cart[$parent_key]['additions_qty'] = array_values($cart[$parent_key]['additions_qty']);
        }else{
            $item = $cart[$parent_key];
            unset($cart[$parent_key]);
            $cart = addOrCombineProduct(
                array_values($cart),
                $item
            );
        }
    } else {
        unset($cart[$fields['product_key']]);
    }
    updateCart($cart);
    redirect('/cart');

}