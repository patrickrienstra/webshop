<?php
require_once 'inc/config.php';
if (isset($_SESSION['logged_in'])) {
    session_destroy();
    header('location: /webshop/index.php');
}