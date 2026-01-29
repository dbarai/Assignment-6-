<?php
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id=$id"));
?>

<h1>Welcome, <?php echo $user['name']; ?> 👋</h1>
<p>Role: <?php echo $user['role']; ?></p>

<a href="logout.php">Logout</a>
