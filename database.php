<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'sqlpass';
$db_name = 'quizzer';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
