<?php
function createUserHandler(array $fields)
{
    dd($_SERVER);
    $query = "INSERT INTO " . Tables::Users->value . "(name,surname,email,password) VALUES (:name,:surname,:email,:password)";
    $query = DB::connect()->prepare($query);
    if ($query->execute($fields)) {
        redirect('/login');
    }else{
        redirect();
    }
}