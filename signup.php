<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <style>
        <style>

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@300&display=swap');

*{
padding: 0;
margin: 0;
font-family: "Open Sans", sans-serif;
}

body {
background-image: url('img/login.jpg'); 
background-position: center;
background-repeat: no-repeat;
color: #1C1678; 
}

.container {
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}

form {
padding: 20px;
width: auto;
background-color: rgb(174, 226, 255, 0.75); /* Blue color theme with some transparency */
border-radius: 10px;
width: 60%;
padding: 50px;
}

form h2 {
    text-align: center;
}

.form-group {
display: flex;
flex-direction: column;
}

.form-button {
display: flex;
justify-content: center;
}

input[type="text"],
input[type="password"],
input[type="email"] {
width: 100%;
height: 30px;
border: none;
border-radius: 10px;
background-color: white;
}

input[type="submit"] {
width: 50%;
border-radius: 20px;
border: none;
height: 30px;
font-size: 20px;
background-color: #00A9FF;
color: #1C1678;
}

.signup-button {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    display: inline-block;
    font-size: 20px;
    cursor: pointer;
    border-radius: 20px;
    border: none;
    height: 30px;
    font-size: 20px;
    width: 50%;
}
.main-section {
    display: flex;
    justify-content: center;
}
.section1 {
    width:50%;
    margin: 20px;
}


#role {
    padding: 10px;
    font-size: 16px;

    border-radius: 10px;
    border: 1px solid #ccc;
    width: 200px; /* Adjust width as needed */
    margin-bottom: 10px;
}

/* Optional: Style the dropdown arrow */
#role::after {
    content: '\25BC'; /* Unicode character for down arrow */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    pointer-events: none;
}

/* Optional: Style when dropdown is open */
#role:focus {
    outline: none;
    border-color: #5cb85c; /* Example color when focused */
    box-shadow: 0 0 5px rgba(92, 184, 92, 0.5); /* Example shadow when focused */
}

#dob {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 200px; /* Adjust width as needed */
    margin-bottom: 10px;
}

/* Optional: Style when focused */
#dob:focus {
    outline: none;
    border-color: #5cb85c; /* Example color when focused */
    box-shadow: 0 0 5px rgba(92, 184, 92, 0.5); /* Example shadow when focused */
}


    </style>
</head>

<body>
    <div class="container">
    <h2>Sign Up</h2>
    <form action="signup.php" method="post" enctype="multipart/form-data">
        <h2>Sign Up</h2>
        <div class="main-section">
            <div class="section1">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
</div>
<div class="section1">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">I am a:</label>
        <select id="role" name="role">
            <option value="buyer">Buyer</option>
            <option value="seller">Seller</option>
        </select><br><br>

        <label for="profile_image">Profile Image:</label>
        <input type="file" id="profile_image" name="profile_image"><br><br>
        <img id="imagePreview" src="" alt="" style="max-width: 200px; max-height: 200px;">
</div>
</div>
        <div class="form-button">
            <button class="signup-button" type="submit">Sign Up</button><br><br>
        </div>
    </form>
    </div>

</body>
<script>
    document.getElementById('profile_image').addEventListener('change', function (event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function () {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>

</html>
<?php
include 'connect.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Database connection


    // Get the image file
    $profileImage = $_FILES['profile_image']['name'];
    $profileImageTmp = $_FILES['profile_image']['tmp_name'];

    // Generate a unique ID for the image file
    $uniqueId = uniqid();
    $profileImageName = $uniqueId . '_' . $profileImage;

    // Move the uploaded image to a desired location
    $targetDirectory = "profile_img/";
    $targetFile = $targetDirectory . basename($profileImageName);
    move_uploaded_file($profileImageTmp, $targetFile);

    $sql = "INSERT INTO users (name, nic, phone, address, dob, email, username, password, role, profile_image) VALUES ('$name', '$nic', '$phone', '$address', '$dob', '$email', '$username', '$password', '$role', '$profileImageName')";

    // Execute the statement
    if ($connect->query($sql) === TRUE) {

        echo "User inserted successfully!";
        echo '<script>window.location.href = "login.php";</script>';

    } else {
        echo "Error: " . $connect->error;
    }

    // Close the connection
    $connect->close();
}
?>