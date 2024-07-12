<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">User Management Form</h1>

        <form action="process.php" method="POST" class="mb-4">
            <input type="hidden" name="id" id="userId">
          
            <div class="form-group">
                <label for="fullName">Full Name:</label>
                <input type="text" name="fullName" id="fullName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="text" name="contactNumber" id="contactNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="emergencyContactNumber">Emergency Contact Number:</label>
                <input type="text" name="emergencyContactNumber" id="emergencyContactNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="dobAadhar">Date of Birth (Aadhar):</label>
                <input type="date" name="dobAadhar" id="dobAadhar" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fathersNameAadhar">Father's Name (Aadhar):</label>
                <input type="text" name="fathersNameAadhar" id="fathersNameAadhar" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="workLocation">Work Location:</label>
                <input type="text" name="workLocation" id="workLocation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" name="designation" id="designation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="personalEmail">Personal Email ID:</label>
                <input type="email" name="personalEmail" id="personalEmail" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="salaryOffered">Salary Offered (CTC):</label>
                <input type="text" name="salaryOffered" id="salaryOffered" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="married">Married:</label>
                <select name="married" id="married" class="form-control" required>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="spouseName">Spouse Name (if married):</label>
                <input type="text" name="spouseName" id="spouseName" class="form-control">
            </div>
            <div class="form-group">
                <label for="children">Children:</label>
                <textarea name="children" id="children" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="panNumber">PAN Number:</label>
                <input type="text" name="panNumber" id="panNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="aadhaarNumber">Aadhaar Number:</label>
                <input type="text" name="aadhaarNumber" id="aadhaarNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="uanNumber">UAN Number:</label>
                <input type="text" name="uanNumber" id="uanNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" name="bankName" id="bankName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bankAccountNumber">Bank Account Number:</label>
                <input type="text" name="bankAccountNumber" id="bankAccountNumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ifscCode">IFSC Code:</label>
                <input type="text" name="ifscCode" id="ifscCode" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="aadhaarAddress">Address (Aadhar):</label>
                <textarea name="aadhaarAddress" id="aadhaarAddress" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="currentAddress">Current Address (if different from Aadhar):</label>
                <textarea name="currentAddress" id="currentAddress" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="bloodGroup">Blood Group:</label>
                <input type="text" name="bloodGroup" id="bloodGroup" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="workExperience">Total Work Experience:</label>
                <input type="text" name="workExperience" id="workExperience" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="previousOrganization">Previous Organization Name:</label>
                <input type="text" name="previousOrganization" id="previousOrganization" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastCtc">Last CTC:</label>
                <input type="text" name="lastCtc" id="lastCtc" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="emergencyContacts">Emergency Contacts (Name/Number/Relation):</label>
                <textarea name="emergencyContacts" id="emergencyContacts" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="references">References (Name/Number/Designation/Email):</label>
                <textarea name="references" id="references" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="passportPhoto">Passport Size Photo:</label>
                <input type="file" name="passportPhoto" id="passportPhoto" class="form-control">
            </div>

            <button type="submit" name="action" value="add" class="btn btn-primary">Add</button>
            <button type="submit" name="action" value="edit" class="btn btn-secondary">Edit</button>
        </form>

        <h2 class="text-center mb-4">Users List</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $result = mysqli_query($conn, "SELECT * FROM users");
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['fullName']}</td>";
                        echo "<td>{$row['personalEmail']}</td>";
                        echo "<td>
                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>No users found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
