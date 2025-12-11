<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="clock";

$con=mysqli_connect("localhost","root","","clock");
    if(mysqli_connect_errno()){
    die("connection fail".mysqli_connect_error());
}

$productResult = $con->query("SELECT COUNT(*) AS total_products FROM products");
$productCount = $productResult->fetch_assoc()['total_products'];

// 🟩 Total Orders
$orderResult = $con->query("SELECT COUNT(*) AS total_orders FROM orders");
$orderCount = $orderResult->fetch_assoc()['total_orders'];

// 🟨 Pending Orders (maan lo orders table maa 'status' column che: Pending, Completed, Cancelled etc.)
$pendingResult = $con->query("SELECT COUNT(*) AS pending_orders FROM orders WHERE status='Pending'");
$pendingCount = $pendingResult->fetch_assoc()['pending_orders'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>WoodenClock</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
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
    <?php include 'include/header.php';?>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php';?> 
        
        <div class="content">
            
           <?php include 'include/navbar.php';?>

            <main class="container-fluid pt-4 px-4">
            <div class="row g-6">
            <h2 class="text-xl font-bold mb-4">Dashboard Overview</h2>
            <div class="container-fluid pt-4 px-4">
                <div class="row gap-2">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2 text-white">Today Prodcut</p>
                                <h6 class="mb-0"><?php echo $productCount ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2 text-white">Total Order</p>
                                <h6 class="mb-0"><?php echo $orderCount ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <div class="ms-3">
                                <p class="mb-2 text-white">Pending Order</p>
                                <h6 class="mb-0"><?php echo $pendingCount ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </main>
        </div>

        <!-- Back to Top -->
        <!-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> -->
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