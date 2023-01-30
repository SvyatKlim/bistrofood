<?php
//dd(getRequestType());
match (getRequestType()) {
    'registration' => createUserHandler(createUserParams()),
    'login' => authUserHandler(loginUserParams()),
    default => redirect()
};