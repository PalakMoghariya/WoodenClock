<!DOCTYPE html>
<html lang="en">
<head>
    <title>WoodenClock</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="p-4">
            <div>
                <h3 class="text-white"><img src="img/logo.png" alt="logo" width="50px">WoodenClock</h3>
            </div>
            <hr class="text-white">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php"><i class="fas fa-tachometer-alt me-2"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#productMenu" role="button"
                        aria-expanded="false" aria-controls="productMenu">
                        <i class="fas fa-box me-2"></i> Product <i class="fas fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="productMenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="add-product.php"><i class="fas fa-plus me-2"></i> Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="view-product.php"><i class="fas fa-eye me-2"></i> View Product</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" data-bs-toggle="collapse" href="#orderMenu" role="button"
                        aria-expanded="false" aria-controls="orderMenu">
                        <i class="fas fa-shopping-cart me-2"></i> Order <i class="fas fa-caret-down float-end"></i>
                    </a>
                    <div class="collapse" id="orderMenu">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="view-order.php"><i class="fas fa-eye me-2"></i> View Order</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="users.php" class="nav-link text-white"><i class="fas fa-users me-2"></i> Users</a>
                </li>

                <li class="nav-item">
                    <a href="contacts.php" class="nav-link text-white"><i class="fas fa-envelope me-2"></i> Contacts</a>
                </li>

                <li class="nav-item">
                    <a href="profile.php" class="nav-link text-white"><i class="fas fa-user-alt me-2"></i> Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
                </li>
            </ul>
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

</body>
</html>