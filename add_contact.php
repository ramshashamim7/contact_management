<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $city = $_POST['city'];

    $sql = "INSERT INTO contacts (name, phone, email, city)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $name,
        $phone,
        $email,
        $city
    );

    mysqli_stmt_execute($stmt);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Add New Contact</h1>

    <form action="" method="POST" class="contact-form">

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Phone Number</label>
        <input type="text" name="phone" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>City</label>
        <input type="text" name="city" required>

        <button type="submit">Add Contact</button>

    </form>

    <br>

    <a href="index.php">Back to Home</a>

</div>

</body>
</html>
