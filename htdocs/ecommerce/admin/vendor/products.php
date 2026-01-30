<?php
include '../db.php';
if ($_SESSION['role'] != 'vendor') header("Location: ../login.php");

$vid = $_SESSION['user_id'];

if (isset($_POST['add'])) {
  $name  = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $cat   = $_POST['category'];

  mysqli_query($conn,
    "INSERT INTO products (vendor_id,category_id,name,price,stock)
     VALUES ($vid,$cat,'$name',$price,$stock)"
  );
}

$products = mysqli_query($conn, "SELECT * FROM products WHERE vendor_id=$vid");
$cats = mysqli_query($conn, "SELECT * FROM categories");
?>

<h2>My Products</h2>

<form method="POST">
  <input name="name" placeholder="Product name" required><br>
  <input name="price" placeholder="Price" required><br>
  <input name="stock" placeholder="Stock" required><br>
  <select name="category">
    <?php while($c=mysqli_fetch_assoc($cats)){ ?>
      <option value="<?= $c['id'] ?>"><?= $c['name'] ?></option>
    <?php } ?>
  </select><br>
  <button name="add">Add Product</button>
</form>

<hr>
<ul>
<?php while($p=mysqli_fetch_assoc($products)){ ?>
  <li><?= $p['name'] ?> - ₹<?= $p['price'] ?></li>
<?php } ?>
</ul>

<a href="dashboard.php">Back</a>
