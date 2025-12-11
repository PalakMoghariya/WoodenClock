<?php
// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clock";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
 die("Connection failed: " . mysqli_connect_error());
}

// Handle Delete
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  mysqli_query($con, "DELETE FROM products WHERE id=$id");
  header("Location: view-product.php"); // refresh after delete
  exit;
}

// Fetch products
$result = mysqli_query($con, "SELECT * FROM products");
$search = '';
if (isset($_GET['search']) && $_GET['search'] !== '') {
  $search = mysqli_real_escape_string($con, trim($_GET['search']));
  $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR category LIKE '%$search%'";
} else {
  $sql = "SELECT * FROM products";
}
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodenClock</title>

    <style>
    .search {
        padding: 8px;
        width: 630px;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }
    </style>
</head>

<body>
    <?php include 'include/header.php'; ?>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include 'include/navbar.php'; ?>
            <main class="container-fluid pt-4 px-4">
                <h2>All Products</h2>
                <a href="add-product.php" class="btn btn-primary">Add New Product</a>
                <br><br>
                <form method="get" action="">
                    <input type="text" name="search" placeholder="Search products..." class="search"
                        value="<?php echo htmlspecialchars($search); ?>">
                </form>
                <br>
                <div class="table-container">
                    <table class="table table-bordered bg-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <tbody id="views-product">
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><img src="uploads/<?php echo $row['image']; ?>" width="80" height="80"></td>
                                <td>
                                    <a href="edit-product.php?id=<?= $row['id'] ?>">Edit</a> &nbsp;
                                    <a href="view-product.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>