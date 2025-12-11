<?php
session_start();
$servername = "localhost";
$username="root";
$password="";
$dbname="clock";

$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = mysqli_query($con, "SELECT * FROM products WHERE id=$id");
    $clock = mysqli_fetch_assoc($result);

    if (!$clock) {
        die("Product not found!");
    }
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "uploads/" . $image;

    // Create folder if not exists
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    // If new image selected
    if (!empty($image)) {
        move_uploaded_file($tmp_name, $folder);
        $sql = "UPDATE products SET name='$name', category='$category', quantity='$quantity', price='$price', image='$image' WHERE id=$id";
    } else {
        // ✅ If user didn’t select new image, don’t change old image
        $sql = "UPDATE products SET name='$name', category='$category', quantity='$quantity', price='$price' WHERE id=$id";
    }

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Product updated successfully!');window.location='view-product.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Wooden Clock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include 'include/navbar.php'; ?>
            <main class="container-fluid pt-4 px-4">
                <h2>Edit Products</h2>
                <form method="POST" enctype="multipart/form-data" class="card p-4 shadow">
                    <div class="mb-3">
                        <label class="form-label">Name : </label>
                        <input type="text" name="name" value="<?php echo $clock['name']; ?>" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category : </label>
                        <select name="category" class="form-control" required>
                            <option value="Home Decore"
                                <?php if ($clock['category']=="Home Decore") echo "selected"; ?>>Home Decore</option>
                            <option value="Wall Decore"
                                <?php if ($clock['category']=="Wall Decore") echo "selected"; ?>>Wall Decore</option>
                            <option value="Table Clocks"
                                <?php if ($clock['category']=="Table Clocks") echo "selected"; ?>>Table Clocks</option>
                            <option value="Personalized Clocks"
                                <?php if ($clock['category']=="Personalized Clocks") echo "selected"; ?>>Personalized
                                Clocks</option>
                            <option value="Vintage Style Wooden Clocks"
                                <?php if ($clock['category']=="Vintage Style Wooden Clocks") echo "selected"; ?>>Vintage
                                Style Wooden Clocks</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price : </label>
                        <input type="number" name="price" value="<?php echo $clock['price']; ?>" class="form-control"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity :</label>
                        <input type="number" name="quantity" value="<?php echo $clock['quantity']; ?>" class="form-control"
                            rows="4" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image : </label><br>
                        <img src="uploads/<?php echo $clock['image']; ?>" width="100"><br><br>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
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