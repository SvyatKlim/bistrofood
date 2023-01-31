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
    case 'admin/products':
        break;
    case 'admin/products/create':
        conditionRedirect(!isAdmin());
        require PAGE_DIR . '/admin/products/create.php';
        break;
    default :
        dd(getUrl() . ' - Not Found');
}