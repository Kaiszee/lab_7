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
    $user->deleteUser($matric);

    
    $db->close();
    
    
    header("Location: read.php");
    exit();
}
?>