<?php

#GET request URI
# show page

switch (getUrl()) {
    case '':
        require PAGE_DIR . '/home.php';
        break;
    case 'registration':
        require PAGE_DIR . '/auth/registration.php';
        break;
    default :
        dd(getUrl() . ' - Not Found');
}