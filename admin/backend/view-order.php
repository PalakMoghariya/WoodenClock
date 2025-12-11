<?php
session_start();

$servername="localhost";
$username="root";
$password="";
$dbname="clock";

$con = mysqli_connect($servername, $username, $password, $dbname);
if(mysqli_connect_errno()){
    die("Connection failed: " . mysqli_connect_error());
}


// Cancel order
if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $con->query("UPDATE orders SET status='Cancelled' WHERE id=$id");
    echo "<script>window.location='view-order.php';</script>";
}

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
}

// Yahi ek hi query use hogi poore page ke liye
$sql ="SELECT * FROM orders";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodenClock</title>

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
    <style>
        .search{
            width: 50%;
            padding: 5px;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include ('include/navbar.php'); ?>
            <main class="container-fluid pt-4 px-4">
                <div id="orders-section" class="section hidden">
                    <h2 class="text-xl font-bold mb-4">Manage Orders</h2>
                    <form method="get" action="">
                        <input type="text" name="search" placeholder="Search order..." class="search"
                        value="<?php echo htmlspecialchars($search); ?>">
                    </form>
                    
                    <br>
                    <div class="table-container">
                        <table class="table table-bordered bg-secondary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="orders-table">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['id']) ?></td>
                                    <td><?= htmlspecialchars($row['customer_name']) ?></td>
                                    <td><?= htmlspecialchars($row['customer_email']) ?></td>
                                    <td><?= htmlspecialchars($row['phone']) ?></td>
                                    <td><?= htmlspecialchars(number_format($row['total_amount'], 2))  ?></td>
                                    <td><?= htmlspecialchars(date('d-M-Y H:i', strtotime($row['order_date']))) ?></td>
                                    <td><?= ($row['status']) ?></td>
                                    <td>
                                        <a href="edit-order.php?id=<?= $row['id'] ?>"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="view-order.php?cancel=<?= $row['id'] ?>"
                                            class="btn btn-sm btn-danger">Cancel</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/main.js"></script>

</body>

</html>
