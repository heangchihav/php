<?php
session_start(); // Start session to check user roles

// Determine if the user is an admin or a regular user
$isAdmin = isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin';
// $isAdmin = true;
// Default to home page
$page = __DIR__ . '/pages/Home.php';
$layout = $isAdmin ? 'admin/layout.php' : 'user/layout.php';

if (isset($_GET['page'])) {
    $requestedPage = basename($_GET['page']);
    $allowedPages = $isAdmin ? ['AdminDashboard.php', 'AdminSettings.php'] : ['Home.php', 'About.php', 'Contact.php'];
    
    if (in_array($requestedPage, $allowedPages)) {
        $page = __DIR__ . '/pages/' . $requestedPage;
    }
}

include __DIR__ . '/templates/' . $layout;
