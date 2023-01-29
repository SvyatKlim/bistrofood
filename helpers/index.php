<?php
function debug_dump($data, $die = false, $dump = true)
{
    echo "<pre>";
    if ($dump) var_dump($data);
    else print_r($data);
    echo "</pre>";
    if ($die) wp_die();
}


function showException(Exception $exception, string $type)
{
    echo '<pre> [' . $type . ']' . print_r($exception->getMessage(), true) . '</pre>';
    echo $exception->getFile() . ':' . $exception->getLine();
    die();
}

function getUrl(): string
{
    $url = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $url)[0];

}

function convertContentToAssoc(array $data = []): array
{
    $assoc = [];
    if (!empty($data)) {
        foreach ($data as $row) {
            $assoc[$row['name']] = json_decode($row['content'], true);
        }
    }
    return $assoc;
}

function getContent(string $condition = "", bool $isSingle = false)
{
    $fields = dbSelect(Tables::Content, condition: $condition, isSingle: $isSingle);
    return $fields = convertContentToAssoc($fields);
}

function showImageSrc(string $imgType = '',array $srcArr = [])
{
    foreach ($srcArr as $key => $source) {
        $imgSrc = IMAGES_URI . $source;
        foreach (IMAGE_BREAKPOINTS as $point => $breakpoint) {
            if ($point === $key) {
               echo "<source media='(min-width:{$breakpoint})' srcset='{$imgSrc}' type='{$imgType}'>";
            }
        }
    }
}