<?php
session_start();
$con = mysqli_connect("localhost","root","","clock");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// --- Delete Message Logic ---
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($con, "DELETE FROM contacts WHERE id = $id");
    header("Location: contacts.php?msg=deleted");
    exit();
}

// Fetch all contact messages
$result = mysqli_query($con, "SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Contact Messages</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php include 'include/header.php'; ?>
    <div class="container-fluid position-relative d-flex p-0">
        <?php include 'include/sidebar.php'; ?>
        <div class="content">
            <?php include 'include/navbar.php'; ?>
            <main class="container-fluid pt-4 px-4">
                <div class="section hidden" id="contacts-section">
                    <h2>Contact Messages</h2>
                    <div class="table-container">
                        <table class="table table-bordered bg-secondary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="contacts-table">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['email']) ?></td>
                                    <td><?= htmlspecialchars($row['message']) ?></td>
                                    <td>
                                        <a href="delete-message.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this message?')">Delete</a>
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

</body>

</html>