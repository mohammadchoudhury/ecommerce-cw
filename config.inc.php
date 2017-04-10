<?php
$TESTING = true;
error_reporting($TESTING ? E_ALL : E_STRICT);

$HOST = 'localhost';
$USERNAME = 'ecommerce';
$PASSWORD = 'Passw0rd';
$DB = 'ecommerce';

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DB);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

setlocale(LC_MONETARY, 'en_GB');
?>