<?php
function authUserHandler(array $fields): void
{
    authUserValidation($fields);
    $user = getUserByEmail($fields['email']);
    conditionRedirect(!$user,'/login');
    conditionRedirect(password_verify($fields['password'],$user['password']),'/login');
    authUser($user['id'],$user['is_admin']);

    unset($_SESSION['login']);

    redirect();

    dd($fields);
}

function authUserValidation(array $fields)
{
    updateSessionFields('login', $fields);

    conditionRedirect(emptyFields($fields, 'login'),'/login');
}