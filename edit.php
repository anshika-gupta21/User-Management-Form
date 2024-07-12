<?php
include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if ID is passed
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data based on ID
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "No user found with the provided ID.";
        exit();
    }
} else {
    echo "Invalid ID.";
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit User</h1>

        <form action="process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" name="fullName" id="fullName" class="form-control" value="<?php echo $user['fullName']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="text" name="contactNumber" id="contactNumber" class="form-control" value="<?php echo $user['contactNumber']; ?>" required>
            </div>
            <div class="form-group">
                <label for="emergencyContactNumber">Emergency Contact Number:</label>
                <input type="text" name="emergencyContactNumber" id="emergencyContactNumber" class="form-control" value="<?php echo $user['emergencyContactNumber']; ?>" required>
            </div>
            <div class="form-group">
                <label for="personalEmail">Personal Email ID:</label>
                <input type="email" name="personalEmail" id="personalEmail" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dobAadhar">Date of Birth (Aadhar):</label>
                <input type="date" name="dobAadhar" id="dobAadhar" class="form-control" value="<?php echo $user['dobAadhar']; ?>" required>
            </div>
            <!-- Include other fields similarly -->
            <div class="form-group">
                <label for="passportPhoto">Passport Size Photo:</label>
                <input type="file" name="passportPhoto" id="passportPhoto" class="form-control">
                <?php if ($user['passportPhoto']): ?>
                    <img src="uploads/<?php echo $user['passportPhoto']; ?>" alt="Passport Photo" width="100">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
