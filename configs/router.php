<?php

#GET request URI
# show page

switch (getUrl()) {
    case '':
        require PAGE_DIR . '/home.php';
        break;
    case 'registration':
        conditionRedirect(isAuth());
        require PAGE_DIR . '/auth/registration.php';
        break;
    case 'login':
        conditionRedirect(isAuth());
        require PAGE_DIR . '/auth/login.php';
        break;
    case 'logout':
        conditionRedirect(!isAuth());
        removeUser();
        redirect();
        break;
    case 'admin/dashboard':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/dashboard.php';
        break;
    case 'admin/content':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/content/index.php';
        break;
    case (bool)preg_match('/admin\/content\/edit\/(\d+)/', getUrl(), $match):
        conditionRedirect(!isAdmin());

        $id = end($match);
        $block = dbFind(Tables::Content, $id);
        conditionRedirect(!$block, '/admin/content');
        $file = ADMIN_PAGE_DIR . "/content/blocks/${block['name']}.php";

        if (!file_exists($file)) {
            notify("View [${block['name']}] for editing this block doesnot exists", "warning");
            redirect('/admin/content');
        }

        require $file;
        break;
    case 'admin/products':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/products/index.php';
        break;
    case 'admin/products/edit':
    case 'admin/products/create':
        conditionRedirect(!isAdmin());
        require ADMIN_PAGE_DIR . '/products/create.php';
        break;
    case 'cart':
        require PAGE_DIR . '/cart.php';
        break;
    case 'account/orders':
        conditionRedirect(!isAuth());
        $userId = userId();
        $orders = dbSelect(Tables::Orders,condition: " user_id = {$userId}");
        $userInfo = getUserById($userId);
        require PAGE_DIR . '/account/orders/index.php';
        break;
    case (bool)preg_match('/account\/orders\/(\d+)/', getUrl(), $match):
        conditionRedirect(!isAuth());

        $id = end($match);
        $order = dbFind(Tables::Orders, $id);
        conditionRedirect(!$order,'/account/orders');
        if ($order['user_id'] !== userId()){
            notify("You are not allowed to see this page", "danger");
            redirect('/account/orders');
        }

        $products = productsByOrder($order['id']);

        require PAGE_DIR . '/account/orders/show.php';
        break;
    default :
        dd(getUrl() . ' - Not Found');
}