<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "clock");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete user
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM users WHERE id=$id");
    header("Location: users.php");
    exit();
}

// Fetch users
$result = mysqli_query($con, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Users</title>
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
    <?php include 'include/header.php';?>

    <div class="container-fluid position-relative d-flex p-0">

        <?php include 'include/sidebar.php';?>

        <div class="content">

            <?php include 'include/navbar.php';?>

            <main class="container-fluid pt-4 px-4">
                <div class="container mt-5">
                    <h2>Users Management</h2>
                    <a href="add-user.php" class="btn btn-primary mb-3">Add New User</a>
                    <div class="table-container">
                        <table class="table table-bordered bg-secondary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="views-table">
                                <?php while ($user = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td><?= $user['fullname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['password'] ?></td>
                                    <td><?= $user['created_at'] ?></td>
                                    <td>
                                        <a href="edit-users.php?id=<?= $user['id'] ?>"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="users.php?delete=<?= $user['id'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</a>
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