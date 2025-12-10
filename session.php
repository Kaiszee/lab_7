<?php
session_start();


function checkLogin() {
    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
}


function checkIfAlreadyLoggedIn() {
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
        header("Location: read.php");
        exit();
    }
}