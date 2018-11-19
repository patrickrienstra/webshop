<?php
session_start();
if (isset($_SESSION['logged_in'])) {
    session_destroy();
    header('location: /webshop/index.php');
}
?>