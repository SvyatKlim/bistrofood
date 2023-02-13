<?php
function authUserHandler(array $fields): void
{
    authUserValidation($fields);
    $user = getUserByEmail($fields['email']);
    conditionRedirect(!$user, '/login');
    conditionRedirect(!password_verify($fields['password'], $user['password']), '/login');
    authUser($user['id'], $user['is_admin']);

    unset($_SESSION['login']);

    conditionRedirect(isAdmin(), '/admin/dashboard');
    redirect();
}

function authUserValidation(array $fields)
{
    $user = getUserByEmail($fields['email']);
    updateSessionFields('login', $fields);
    authUserEmailValidation($user);
    authUserPasswordValidation($fields['password'],$user['password']);
    conditionRedirect(emptyFields($fields, 'login'), '/login');
    conditionRedirect(!$user, '/login');
    conditionRedirect(!password_verify($fields['password'], $user['password']), '/login');
}

function authUserEmailValidation(bool|array $email): bool
{
    if (!$email) {
        $_SESSION['login']['errors']['email'] = 'Sorry, this user is not registered.';
        return false;
    }

    return true;
}

function authUserPasswordValidation(string $fieldsPassword,$userPassword): bool
{
    if (!password_verify($fieldsPassword, $userPassword)) {
        $_SESSION['login']['errors']['password'] = 'The password is not correct.';
        return false;
    }

    return true;
}
;