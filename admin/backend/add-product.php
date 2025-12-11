<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clock";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert flower/seed
if (isset($_POST['add'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = floatval($_POST['price']);
    $quantity = floatval($_POST['quantity']);

    // Image upload handling
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "uploads/" . $image;

    // Create folder if not exists
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    if (move_uploaded_file($tmp_name, $folder)) {
        $sql = "INSERT INTO products (name, category, price,quantity, image) VALUES ('$name', '$category', '$quantity', '$price', '$image')";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Products added successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>WoodenClock</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include ('include/navbar.php'); ?>
            <main class="container-fluid pt-4 px-4">
                <h2 class="mb-4">Add New Products</h2>
                <form method="POST" enctype="multipart/form-data" class="card p-4 shadow">
                    <div class="mb-3">
                        <label class="form-label">Product Name : </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Product name" required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Category : </label>
                        <select name="category" class="form-control" required>
                            <option value="">-- Select Category --</option>
                            <option value="Home Decore">Home Decore</option>
                            <option value="Wall Decore">Wall Decore</option>
                            <option value="Table Clocks">Table Clocks</option>
                            <option value="Wooden Art Clock">Wooden Art Clocks</option>
                            <option value="Vintage Style Wooden Clocks">Vintage Style Wooden Clocks</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price : </label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity :</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image :</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>

                    <button type="submit" name="add" class="btn btn-success">Add Products</button>
                </form>
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