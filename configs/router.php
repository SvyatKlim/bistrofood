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
    default :
        dd(getUrl() . ' - Not Found');
}