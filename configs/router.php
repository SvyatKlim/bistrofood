<?php

#GET request URI
# show page

switch (getUrl()) {
    case '':
        require PAGE_DIR . '/home.php';
        break;
    default :
        dd(getUrl() . ' - Not Found');
}