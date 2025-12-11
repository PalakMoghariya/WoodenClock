<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "clock");
$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM users WHERE id=$id"));

if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update = mysqli_query($con, "UPDATE users SET fullname='$fullname', email='$email', password='$password' WHERE id=$id");
    if ($update) {
        header("Location: Users.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoodenClock | edit-users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include 'include/header.php';?>

    <div class="container-fluid position-relative d-flex p-0">

        <?php include 'include/sidebar.php';?>

        <div class="content">

            <?php include 'include/navbar.php';?>

            <main class="container-fluid pt-4 px-4">
                <h2>Edit Users</h2>
                    <form method="POST" encrypt="multipart/form-data" class="card p-4 shadow">
                        <div class="mb-3">
                            <label>Fullname : </label>
                            <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" class="form-control bg-white text-black" required>
                        </div>
                        <div class="mb-3">
                            <label>Email : </label>
                        <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control bg-white text-black" required>
                        </div>
                        <div class="mb-3">
                            <label>Password : </label>
                        <input type="text" name="phone" value="<?php echo $user['password'] ?>" class="form-control bg-white text-black" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </form>
            </main>
        </div>
    </div>
</body>

</html>