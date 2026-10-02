<?php
include("config.php");

$id = (int)$_GET['id'];

$sql = "SELECT * FROM contacts WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$contact = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Edit Contact</h1>

    <form action="update_contact.php" method="POST" class="contact-form">

        <input type="hidden" name="id" value="<?php echo $contact['id']; ?>">

        <label>Name</label>
        <input
            type="text"
            name="name"
            value="<?php echo $contact['name']; ?>"
            required
        >

        <label>Phone Number</label>
        <input
            type="text"
            name="phone"
            value="<?php echo $contact['phone']; ?>"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?php echo $contact['email']; ?>"
            required
        >

        <label>City</label>
        <input
            type="text"
            name="city"
            value="<?php echo $contact['city']; ?>"
            required
        >

        <button type="submit">Update Contact</button>

    </form>

    <br>

    <a href="index.php">Back to Home</a>

</div>

</body>
</html>
