<?php
include "conn.php";
session_start();

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$_SESSION['login'] = FALSE;

session_unset();

header('Location: ../index.php');

?>