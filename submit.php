<?php

// Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aicptask1";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("A technical problem occured! Please Try again...". $conn->connect_error . "<br>");
}

// Getting Data form Form

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $idType = $_POST['idType'];
    $idNumber = $_POST['idNumber'];
    $issueAuth = $_POST['issueDepartment'];
    $doi = $_POST['issueDate'];
    $issueState = $_POST['issueState'];
    $doe = $_POST['expiryDate'];

    // Saving data in database
    $sql = "INSERT INTO `users` (`name`, `dob`, `email`, `mno`, `gender`, `occupation`, `idtype`, `idno`, `issueauth`, `doi`, `issuestate`, `doe`) VALUES ('$name','$dob','$email','$phone','$gender','$occupation',' $idType','$idNumber','$issueAuth','$doi','$issueState','$doe')";
    $result = $conn->query($sql);
    if($result){
    echo "Form Submitted Successfully!<br><br><br>";
    }else{
        echo "A technical problem occured! Please Try again...<br>";
    }
}

// Displaying Data from Database

echo "Data in Database: <br>";
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);

$num = $result->num_rows;
echo "Number of Entries: $num <br><br>";

if ($num > 0) {
    $sno = 1;
    while ($row = $result->fetch_assoc()) {
        echo "No: " . $sno . " <br> Name: " . $row["name"] . " <br> Date of Birth: " . $row["dob"] . " <br> Email: " . $row["email"] . " <br> Mobile Number: " . $row["mno"] . " <br> Gender: " . $row["gender"] . " <br> Occupation: " . $row["occupation"] . " <br> ID Type: " . $row["idtype"] . " <br> ID Number: " . $row["idno"] . " <br> Issue Authority: " . $row["issueauth"] . " <br> Issue Date: " . $row["doi"] . " <br> Issue State: " . $row["issuestate"] . " <br> Expiry Date: " . $row["doe"] . "<br>";
        echo "<br><br><br>";
    }
}