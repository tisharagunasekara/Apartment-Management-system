<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Apartment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke="%23333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Add Apartment</h2>
    <form method="POST" action="add_apartment.php" enctype="multipart/form-data">

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div>
            <label for="description">description:</label>
            <input type="text" id="description" name="description" required>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>
        </div>
        <div>
            <label for="available">Available:</label>
            <select id="available" name="available" required>
                <option value="1">Rent</option>
                <option value="0">Sale</option>
            </select>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <input type="submit" value="Add Apartment">
    </form>

</body>

</html>
<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $price = $_POST["price"];
    $available = $_POST["available"];
    $description = $_POST["description"];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $apartmentImage = $_FILES['image']['name'];
        $apartmentImageTmp = $_FILES['image']['tmp_name'];


        $uniqueId = uniqid();
        $apartmentImageName = $uniqueId . '_' . $apartmentImage;


        $targetDirectory = "apartment_image/";
        $targetFile = $targetDirectory . basename($apartmentImageName);


        if (move_uploaded_file($apartmentImageTmp, $targetFile)) {

            $sql = "INSERT INTO apartment (userid, name, address, city, price, available, image,description) VALUES ('$user_id', '$name', '$address', '$city', '$price', '$available', '$targetFile','$description')";
            if ($connect->query($sql) === TRUE) {
                echo "<script>alert('Apartment added successfully!');</script>";
                header("Location: user_profile.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {

        $sql = "INSERT INTO apartment (userid, name, address, city, price, available,description) VALUES ('$user_id', '$name', '$address', '$city', '$price', '$available','$description')";
        if ($connect->query($sql) === TRUE) {
            echo "<script>alert('Apartment added successfully!');</script>";
            echo "<script>window.location = 'user_profile.php'</script>";
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }
}

?>