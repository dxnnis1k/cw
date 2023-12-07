<?php

if (empty($_POST["username"])) {
    die("Username is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ) {
    die("Valid email is required");
}

print_r($_POST);