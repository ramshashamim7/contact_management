<?php
include 'config.php';

if(isset($_GET['id'])) {

    $id = (int)$_GET['id'];

    $sql = "DELETE FROM contacts WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("Location:index.php");
    exit();
}
?>