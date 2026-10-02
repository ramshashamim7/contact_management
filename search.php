<?php
include 'config.php';

$keyword = "";

if(isset($_GET['search'])) {

    $keyword = $_GET['search'];

    $search = "%" . $keyword . "%";

    $sql = "SELECT * FROM contacts WHERE name LIKE ? ORDER BY id DESC";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $search);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Contacts</title>
</head>
<body>

<h2>Search Contacts</h2>

<form action="search.php" method="GET">

    <input
        type="text"
        name="search"
        placeholder="Enter contact name"
        value="<?php echo htmlspecialchars($keyword); ?>"
        required
    >

    <button type="submit">Search</button>

</form>

<br>

<a href="index.php">Back to Home</a>

<br><br>

<?php
if(isset($result)) {

    if(mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='10'>";

        echo "<tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
              </tr>";

        while($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";

            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['city']) . "</td>";

            echo "</tr>";
        }

        echo "</table>";

    } else {

        echo "<h3>No Contact Found</h3>";

    }
}
?>

</body>
</html>