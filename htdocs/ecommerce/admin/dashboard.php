<?php
include '../db.php';
if ($_SESSION['role'] != 'admin') header("Location: ../login.php");
?>
<h1>Admin Dashboard</h1>
<a href="../logout.php">Logout</a>
