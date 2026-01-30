<?php
include '../db.php';
if ($_SESSION['role'] != 'admin') header("Location: ../login.php");

if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    mysqli_query($conn, "INSERT INTO categories (name) VALUES ('$name')");
}
$cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<h2>Manage Categories</h2>

<form method="POST">
  <input type="text" name="name" placeholder="Category name" required>
  <button name="add">Add</button>
</form>

<ul>
<?php while($c = mysqli_fetch_assoc($cats)) { ?>
  <li><?php echo $c['name']; ?></li>
<?php } ?>
</ul>

<a href="dashboard.php">Back</a>
