<?php
require PARTS_DIR . '/header.php';

$content = getContent('name IN ("banner", "about", "products","team","reviews","booking","gallery")');
extract($content);
//dd($content);
if (!empty($banner)) {
    require PARTS_DIR . '/home/intro.php';
}
if (!empty($about)) {
    require PARTS_DIR . '/home/about.php';
}
if (!empty($products)) {
    require PARTS_DIR . '/home/products.php';
}
if (!empty($team)) {
    require PARTS_DIR . '/home/team.php';
}
if (!empty($reviews)) {
    require PARTS_DIR . '/home/testimonials.php';
}
//if (!empty($banner)) {
    require PARTS_DIR . '/home/gallery.php';
//}
require PARTS_DIR . '/footer.php';