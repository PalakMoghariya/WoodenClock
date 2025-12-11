<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="clock";

$con=mysqli_connect($servername,$username,$password,$dbname);
if(mysqli_connect_errno()){
die("connection fail".mysqli_connect_error());
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if (isset($_POST['update'])) {
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $phone = $_POST['phone'];
    $total_amount = $_POST['total_amount'];
    $address = $_POST['address'];

    $update = mysqli_query($con, "UPDATE orders SET customer_name='$customer_name', customer_email='$customer_email', phone='$phone', total_amount='$total_amount', address='$address' WHERE id=$id");

    if ($update) {
        header("Location: view-order.php");
        exit();
    }
}

$result = $con->query("SELECT * FROM orders WHERE id=$id");
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodenClock | Edit Order</title>
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include ('include/navbar.php'); ?>
            <main class="container-fluid pt-4 px-4">
                <h2>Edit Order</h2>
                <form method="POST">
                    <input type="text" name="customer_name" value="<?= $order['customer_name'] ?>"
                        class="form-control mb-2 bg-white text-black" required>
                    <input type="text" name="customer_email" value="<?= $order['customer_email'] ?>"
                        class="form-control mb-2 bg-white text-black" required>
                    <input type="number" name="phone" value="<?= $order['phone'] ?>" class="form-control mb-2 bg-white text-black" required>
                    <input type="number" name="total_amount" value="<?= $order['total_amount'] ?>"
                        class="form-control mb-2 bg-white text-black" required>
                    <input type="text" name="address" value="<?= $order['address'] ?>" class="form-control mb-2 bg-white text-black"
                        required>
                    <!-- <select name="status" class="form-control mb-2">
                        <option <?= $order['status']=='Pending'?'selected':'' ?>>Pending</option>
                        <option <?= $order['status']=='Completed'?'selected':'' ?>>Completed</option>
                        <option <?= $order['status']=='Cancelled'?'selected':'' ?>>Cancelled</option>
                    </select> -->
                    <button type="submit" name="update" class="btn btn-success">Update Order</button>
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