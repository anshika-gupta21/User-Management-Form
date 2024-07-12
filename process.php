<?php
include 'config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $fullName = $_POST['fullName'] ?? '';
    $contactNumber = $_POST['contactNumber'] ?? '';
    $emergencyContactNumber = $_POST['emergencyContactNumber'] ?? '';
    $dobAadhar = $_POST['dobAadhar'] ?? '';
    $fathersNameAadhar = $_POST['fathersNameAadhar'] ?? '';
    $workLocation = $_POST['workLocation'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $personalEmail = $_POST['personalEmail'] ?? '';
    $salaryOffered = $_POST['salaryOffered'] ?? '';
   $married = $_POST['married'] ?? 'No';
    $spouseName = $_POST['spouseName'] ?? '';
    $children = $_POST['children'] ?? '';
    $panNumber = $_POST['panNumber'] ?? '';
    $aadhaarNumber = $_POST['aadhaarNumber'] ?? '';
    $uanNumber = $_POST['uanNumber'] ?? '';
    $bankName = $_POST['bankName'] ?? '';
    $bankAccountNumber = $_POST['bankAccountNumber'] ?? '';
    $ifscCode = $_POST['ifscCode'] ?? '';
    $aadhaarAddress = $_POST['aadhaarAddress'] ?? '';
    $currentAddress = $_POST['currentAddress'] ?? '';
    $bloodGroup = $_POST['bloodGroup'] ?? '';
    $workExperience = $_POST['workExperience'] ?? '';
    $previousOrganization = $_POST['previousOrganization'] ?? '';
    $lastCtc = $_POST['lastCtc'] ?? '';
    $emergencyContacts = $_POST['emergencyContacts'] ?? '';
    $references = $_POST['references'] ?? '';

    $passportPhoto = '';
    if (isset($_FILES['passportPhoto']) && $_FILES['passportPhoto']['error'] == UPLOAD_ERR_OK) {
        $passportPhoto = $_FILES['passportPhoto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($passportPhoto);
        if (!move_uploaded_file($_FILES['passportPhoto']['tmp_name'], $target_file)) {
            die('Error uploading file');
        }
    }

    if ($id) {

        $sql = "UPDATE users SET 
                    fullName='$fullName', 
                    contactNumber='$contactNumber', 
                    emergencyContactNumber='$emergencyContactNumber', 
                    dobAadhar='$dobAadhar', 
                    fathersNameAadhar='$fathersNameAadhar', 
                    workLocation='$workLocation', 
                    designation='$designation', 
                    personalEmail='$personalEmail', 
                    salaryOffered='$salaryOffered', 
                    married='$married', 
                    spouseName='$spouseName', 
                    children='$children', 
                    panNumber='$panNumber', 
                    aadhaarNumber='$aadhaarNumber', 
                    uanNumber='$uanNumber', 
                    bankName='$bankName', 
                    bankAccountNumber='$bankAccountNumber', 
                    ifscCode='$ifscCode', 
                    aadhaarAddress='$aadhaarAddress', 
                    currentAddress='$currentAddress', 
                    bloodGroup='$bloodGroup', 
                    workExperience='$workExperience', 
                    previousOrganization='$previousOrganization', 
                    lastCtc='$lastCtc', 
                    emergencyContacts='$emergencyContacts', 
                    `references`='$references', 
                    passportPhoto='$passportPhoto' 
                WHERE id=$id";
    } else {

        $sql = "INSERT INTO users (
                    fullName, 
                    contactNumber, 
                    emergencyContactNumber, 
                    dobAadhar, 
                    fathersNameAadhar, 
                 
                    workLocation, 
                    designation, 
                    personalEmail, 
                    salaryOffered, 
                    married, 
                    spouseName, 
                    children, 
                    panNumber, 
                    aadhaarNumber, 
                    uanNumber, 
                    bankName, 
                    bankAccountNumber, 
                    ifscCode, 
                    aadhaarAddress, 
                    currentAddress, 
                    bloodGroup, 
                    workExperience, 
                    previousOrganization, 
                    lastCtc, 
                    emergencyContacts, 
                    `references`, 
                    passportPhoto
                ) VALUES (
                    '$fullName', 
                    '$contactNumber', 
                    '$emergencyContactNumber', 
                    '$dobAadhar', 
                    '$fathersNameAadhar', 
              
                    '$workLocation', 
                    '$designation', 
                    '$personalEmail', 
                    '$salaryOffered', 
                    '$married', 
                    '$spouseName', 
                    '$children', 
                    '$panNumber', 
                    '$aadhaarNumber', 
                    '$uanNumber', 
                    '$bankName', 
                    '$bankAccountNumber', 
                    '$ifscCode', 
                    '$aadhaarAddress', 
                    '$currentAddress', 
                    '$bloodGroup', 
                    '$workExperience', 
                    '$previousOrganization', 
                    '$lastCtc', 
                    '$emergencyContacts', 
                    '$references', 
                    '$passportPhoto'
                )";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit();
}
?>
