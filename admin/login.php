<?php 
session_start();
include('conn.php');

// If already logged in → redirect to admin
if (isset($_SESSION['aid'])) {
    header("Location: backend/index.php");
    exit();
}

if (isset($_POST['submit'])) {

    $uname = $_POST['id'];
    $password = $_POST['password'];

    $query = mysqli_query($con, "SELECT ID, loginid, password FROM tbl_login WHERE loginid='$uname'");

    if ($row = mysqli_fetch_assoc($query)) {

        // Check password
        if ($row['password'] == $password) {

            // Set Sessions
            $_SESSION['aid']   = $row['ID'];
            $_SESSION['login'] = $row['loginid'];

            header("Location: backend/index.php");
            exit();
        } 
        else {
            $error = "Invalid Password!";
        }

    } else {
        $error = "Invalid Login ID!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>

    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="backend/css/login.css">
    <link rel="stylesheet" href="backend/css/style.css">
</head>

<body>
    <div class="container">

        <br><br><br><br>
        <div class="col-md-4 col-md-offset-4">

            <div class="panel panel-primary">
                
                <div class="panel-heading">
                    <h3 class="panel-title">Login In</h3>
                </div>

                <div class="panel-body">

                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php } ?>

                    <form method="POST">
                        <fieldset>

                            <div class="form-group">
                                <input class="form-control" placeholder="Login Id" id="id" name="id" type="text" required autofocus autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                                <a href="password-recovery.php">Password Recovery</a>
                            </div>

                            <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">

                        </fieldset>
                    </form>

                </div>
            </div>

        </div>
    </div>

</body>
</html>
