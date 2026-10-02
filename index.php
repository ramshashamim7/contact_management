<?php
include("config.php");

// Total Contacts - Bonus Feature
$countQuery = "SELECT COUNT(*) AS total FROM contacts";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalContacts = $countRow['total'];

// Display all contacts
$sql = "SELECT * FROM contacts ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Contact Management System</h1>

        <!-- Bonus Feature -->
        <div class="total-box">
            Total Contacts: <?php echo $totalContacts; ?>
        </div>

        <div class="top-section">

            <a href="add_contact.php" class="btn add-btn">
                + Add Contact
            </a>

            <form action="search.php" method="GET" class="search-form">
                <input
                    type="text"
                    name="keyword"
                    placeholder="Search by name"
                    required
                >
                <button type="submit">Search</button>
            </form>

        </div>

        <h2>All Contacts</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Actions</th>
            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['city']; ?></td>

                <td>
                    <a
                        href="edit_contact.php?id=<?php echo $row['id']; ?>"
                        class="edit-btn"
                    >
                        Edit
                    </a>

                    <a
                        href="delete_contact.php?id=<?php echo $row['id']; ?>"
                        class="delete-btn"
                        onclick="return confirm('Are you sure you want to delete this contact?');"
                    >
                        Delete
                    </a>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>

</body>
</html>