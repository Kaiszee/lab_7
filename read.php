<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

include 'Database.php';
include 'User.php';


$database = new Database();
$db = $database->getConnection();


$user = new User($db);
$result = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>User List</h1>
        <p>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>! (<a href="logout.php">Logout</a>)</p>
        
        <table border="1">
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Access Level</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["matric"]); ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["role"]); ?></td>
                        <td><a href="update_form.php?matric=<?php echo urlencode($row["matric"]); ?>">Update</a></td>
                        <td><a href="delete.php?matric=<?php echo urlencode($row["matric"]); ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
           
            $db->close();
            ?>
        </table>
    </div>
</body>

</html>