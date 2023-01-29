<?php
//dd(getRequestType());
match (getRequestType()) {
    'registration' => createUserHandler(createUserParams()),
    default => redirect()
};