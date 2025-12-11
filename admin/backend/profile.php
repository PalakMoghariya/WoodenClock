<?php
session_start();
include("../conn.php");

// Session check
if (!isset($_SESSION['aid'])) {
    header("Location: ../login.php");
    exit();
}

$admin_id = $_SESSION['aid'];

// Fetch admin details
$sql = "SELECT * FROM tbl_login WHERE ID='$admin_id'";
$res = mysqli_query($con, $sql);
$admin = mysqli_fetch_assoc($res);

// Update profile
if (isset($_POST['update_profile'])) {
    $fullname = $_POST['FullName'];
    $email = $_POST['email'];

    mysqli_query($con, "UPDATE tbl_login SET FullName='$FullName', AdminEmail='$email' WHERE ID='$admin_id'");

    echo "<script>alert('Profile Updated Successfully!');window.location='profile.php';</script>";
}

// Update password
if (isset($_POST['update_password'])) {
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    if ($admin['password'] == $old_pass) {
        mysqli_query($con, "UPDATE tbl_login SET password='$new_pass' WHERE ID='$admin_id'");
        echo "<script>alert('Password Updated Successfully!');window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Old password is wrong!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Profile</title>
    <!-- <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
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
                <div id="profile-section" class="section hidden">
                    <div class="container" style="background:#f9f9f9; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);">
                        <h2 class="text-center" style="margin-top:40px;color:black;">Admin Profile</h2>

                        <div class="row">

                            <!-- Profile Update Section -->
                            <div class="col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Update Profile</div>
                                    <div class="panel-body">

                                        <form method="POST">
                                            <div class="form-group">
                                                <label>Full Name:</label>
                                                <input type="text" name="FullName" class="form-control bg-white text-dark"
                                                    value="<?= $admin['FullName'];?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control bg-white text-dark"
                                                    value="<?= $admin['AdminEmail']; ?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Login ID:</label>
                                                <input type="text" class="form-control"
                                                    value="<?= $admin['loginid']; ?>" disabled>
                                            </div>
                                            <br>
                                            <button type="submit" name="update_profile"
                                                class="btn btn-primary btn-block">
                                                Update Profile
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Password Update Section -->
                            <div class="col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">Change Password</div>
                                    <div class="panel-body">

                                        <form method="POST">

                                            <div class="form-group">
                                                <label>Old Password:</label>
                                                <input type="password" name="old_pass" class="form-control bg-white text-dark" required>
                                            </div>

                                            <div class="form-group">
                                                <label>New Password:</label>
                                                <input type="password" name="new_pass" class="form-control text-dark bg-white" required>
                                            </div>
                                            <br>
                                            <button type="submit" name="update_password"
                                                class="btn btn-danger btn-block">
                                                Update Password
                                            </button>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
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