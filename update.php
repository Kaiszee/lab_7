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
    $result = $user->updateUser($matric, $name, $role);


    $db->close();
    
  
    if ($result === true) {
        echo "<script>alert('User updated successfully!'); window.location.href='read.php?success=updated';</script>";
    } else {
        echo "<script>alert('Failed to update user!'); window.location.href='read.php';</script>";
    }
    exit();
}
?>