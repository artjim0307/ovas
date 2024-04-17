<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the connection is HTTPS
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 

$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI'];

// Include the config.php file to access the redirect function
require_once('../config.php');

// If session does not exist and the current page is not login or register page, redirect to login page
if (!isset($_SESSION['userdata']) && !strpos($link, 'login.php') && !strpos($link, 'register.php')){
    redirect('admin/login.php');
}

// If session exists and the current page is login page, redirect to index page
if (isset($_SESSION['userdata']) && strpos($link, 'login.php')){
    redirect('admin/index.php');
}
 
// Restrict access to admin panel for non-admin users
$module = array('', 'admin', 'faculty', 'student');
if (isset($_SESSION['userdata']) && (strpos($link, 'index.php') !== false || strpos($link, 'admin/') !== false) && $_SESSION['userdata']['login_type'] != 1){
    echo "<script>alert('Access Denied!');location.replace('".base_url.$module[$_SESSION['userdata']['login_type']]."');</script>";
    exit;
}

// If userData exists and type is 3, redirect to ../index.php
if (isset($_SESSION['userdata']) && $_SESSION['userdata']['login_type'] == 3) {
    redirect('../index.php');
}
?>
