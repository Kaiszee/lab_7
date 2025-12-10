<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Please login first!'); window.location.href='login.php';</script>";
    exit();
}

include 'Database.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
   
    $matric = $_GET['matric'];

    
    $database = new Database();
    $db = $database->getConnection();

    $user = new User($db);
    $result = $user->deleteUser($matric);

    $db->close();
    
    if ($result === true) {
        echo "<script>alert('User deleted successfully!'); window.location.href='read.php';</script>";
    } else {
        echo "<script>alert('Failed to delete user!'); window.location.href='read.php';</script>";
    }
    exit();
}
?>