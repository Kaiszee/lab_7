<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

   
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $user->updateUser($matric, $name, $role);

   
    $db->close();
    
   
    header("Location: read.php");
    exit();
}
?>