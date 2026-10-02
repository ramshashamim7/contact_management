<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "12345",
    "contact_management"
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>