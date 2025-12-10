<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Registration Page</h1>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 'registration_failed') {
            echo '<p style="color: red;">Registration failed! Please try again.</p>';
        }
        ?>
        <form action="insert.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required><br>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <label for="role">Role:</label>
            <select name="role" id="role" required>
                <option value="">Please select</option>
                <option value="lecturer">Lecturer</option>
                <option value="student">Student</option>
            </select><br>
            <input type="submit" name="submit" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>

</html>