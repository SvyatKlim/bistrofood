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

function getHomeUrl()
{
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? $link = "https" : $link = "http";
    $link .= "://";
    $link .= $_SERVER['HTTP_HOST'];
    return $link;
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

function showImageSrc(string $imgType = '', array $srcArr = [])
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

function getRequestType(): string
{
    $type = str_replace('>', '', filter_input(INPUT_POST, 'type'));
    unset($_POST['type']);
    return htmlspecialchars($type);
}

function redirect(string $path = '/')
{
    $url = DOMAIN . $path;
    header("Location: {$url}");
    exit;
}

function redirectBack()
{
    $url = $_SERVER['HTTP_REFERER'];
    header("Location: {$url}");
    exit;
}

function emptyFields(array $fields, string $sessionKey): bool
{
    $result = false;
    $emptyFields = array_keys($fields, null);
    if (!empty($emptyFields)) {
        foreach ($emptyFields as $fieldName) {
            $_SESSION[$sessionKey]['errors'][$fieldName] = "Field '{$fieldName}' is empty";
        }
        $result = true;
    }

    return $result;
}

function formError(string|null $message = null): string
{
    $template = '<div class="ms-3 mb-3">
                    <span class="alert alert-danger">%s</span>
                 </div>';

    return $message ? sprintf($template, $message) : '';
}

function conditionRedirect(bool $condition = false, $path = '/')
{
    if ($condition) {
        redirect($path);
    }
}

function calculatePagination(int $count, int $perPage): int
{
    return (int)round($count / $perPage);
}

function URL_exists(string $url): bool
{
// Open file
    $handle = @fopen($url, 'r');

// Check if file exists
    if (!$handle) {
        return false;
    } else {
        return true;
    }
}

/**
 * @throws Exception
 */
function requestToken(): bool
{
    $token = filter_input(INPUT_POST, 'token');
    if($token) userExpireTime();
    return $token && findUserByToken($token);
}

function userExpireTime(): void
{
    if ($_SESSION['token']['expire_time'] <= time()) {
        unset($_SESSION['token']['expire_time']);
        redirect('/logout');
        notify("Your session has timed out. ");
    }
}