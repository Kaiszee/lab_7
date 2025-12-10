<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Login Page</h1>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'invalid') {
                echo '<p style="color: red;">Invalid matric or password!</p>';
            } elseif ($_GET['error'] == 'empty') {
                echo '<p style="color: red;">Please fill in all fields!</p>';
            } elseif ($_GET['error'] == 'not_logged_in') {
                echo '<p style="color: red;">Please login first!</p>';
            }
        }
        if (isset($_GET['success']) && $_GET['success'] == 'registered') {
            echo '<p style="color: green;">Registration successful! Please login.</p>';
        }
        if (isset($_GET['message']) && $_GET['message'] == 'logged_out') {
            echo '<p style="color: green;">You have been logged out successfully.</p>';
        }
        ?>
        <form action="authenticate.php" method="post">
            <label for="matric">Matric:</label>
            <input type="text" name="matric" id="matric" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <input type="submit" name="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register_form.php">Register here</a></p>
    </div>
</body>

</html>