<?php
function formSessionData(string $key)
{
    $fields = $_SESSION[$key]['fields'] ?? [];
    $errors = $_SESSION[$key]['errors'] ?? [];
    if (!empty($_SESSION[$key])) {
        unset($_SESSION['registration']);
    }

    return compact('fields', 'errors');
}

function updateSessionFields(string $key, array $fields): void
{
    unset($_SESSION[$key]);
    $_SESSION[$key]['fields'] = $fields;
}

function authUser(int $id, bool $isAdmin = false): void
{
    $_SESSION['user'] = compact('id', 'isAdmin');
}

function removeUser(): void
{
    unset($_SESSION['user']);
}

function isAdmin(): bool
{
    return isAuth() ? $_SESSION['user']['isAdmin'] : false;
}

function isAuth(): bool
{
    return !empty($_SESSION['user']);
}