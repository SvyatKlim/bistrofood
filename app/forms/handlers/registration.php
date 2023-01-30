<?php
function createUserHandler(array $fields)
{
    createUserValidation($fields);
//    dd($fields,password_hash($fields['password'],PASSWORD_BCRYPT));
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
    updateSessionFields('registration',$fields);

    if (emptyFields($fields, 'registration') || !passwordValidation($fields['password'], $fields['password_confirmation'])) {
        redirect('/registration');
    }
}

function passwordValidation(string $password, string $passwordConfirmation): bool
{
    if (strlen($password) < 8) {
        $_SESSION['registration']['errors']['password'] = 'Password length should be more than 7 symbols';
        return false;
    }
    if ($password !== $passwordConfirmation) {
        $_SESSION['registration']['errors']['password'] = 'Password are not equals';
        return false;
    }
    return true;
}

;