<?php
function createUserHandler(array $fields)
{
    createUserValidation($fields);

    $query = "INSERT INTO " . Tables::Users->value . "(name,surname,email,password) VALUES (:name,:surname,:email,:password)";
    $query = DB::connect()->prepare($query);

    $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
    unset($fields['password_confirmation']);

    $query->execute($fields);
    unset($_SESSION['registration']);
    redirect('/login');
}

function createUserValidation(array $fields)
{
    updateSessionFields('registration', $fields);

    if (emptyFields($fields, 'registration') || !emailValidation($fields['email'])  || !passwordValidation($fields['password'], $fields['password_confirmation'] )) {
        redirect('/registration');
    }
}

function passwordValidation(string $password, string $passwordConfirmation): bool
{
    if (strlen($password) < 8) {
        $_SESSION['registration']['errors']['password'] = "Password length should be more than 7 symbols";
        return false;
    }

    if ($password !== $passwordConfirmation) {
        $_SESSION['registration']['errors']['password'] = "Passwords are not equals";
        return false;
    }

    return true;
}

;

function emailValidation(string $email): bool
{
    if (getUserByEmail($email)) {
        $_SESSION['registration']['errors']['email'] = 'Sorry, user with this email address is exist.';
        return false;
    }

    return true;
};