<?php
include("config.php");

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];

$sql = "UPDATE contacts
        SET name = ?, phone = ?, email = ?, city = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssi",
    $name,
    $phone,
    $email,
    $city,
    $id
);

mysqli_stmt_execute($stmt);

header("Location: index.php");
exit();
?>