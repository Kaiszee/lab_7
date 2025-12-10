<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

include 'Database.php';
include 'User.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve the matric value from the GET request
    $matric = $_GET['matric'];

    // Create an instance of the Database class and get the connection
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $userDetails = $user->getUser($matric);

    $db->close();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1>Update User</h1>
            <form action="update.php" method="post">
                <label for="matric">Matric:</label>
                <input type="text" id="matric" name="matric" value="<?php echo htmlspecialchars($userDetails['matric']); ?>" readonly><br>
                
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>" required><br>
                
                <label for="role">Access Level:</label>
                <select name="role" id="role" required>
                    <option value="">Please select</option>
                    <option value="lecturer" <?php if ($userDetails['role'] == 'lecturer') echo "selected"; ?>>Lecturer</option>
                    <option value="student" <?php if ($userDetails['role'] == 'student') echo "selected"; ?>>Student</option>
                </select><br>
                
                <input type="submit" value="Update">
                <a href="read.php" class="button">Cancel</a>
            </form>
        </div>
    </body>

    </html>
    <?php
}
?>