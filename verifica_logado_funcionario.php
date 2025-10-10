<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'f') {
    header("Location: index.php");
}
?>