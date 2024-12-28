<?php include 'connect.php';
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        /* Styles for Apartment View Page */
.apartment-details {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: center;
    height: 70vh;
}

.section1 {
    width: 100%;
    padding: 20px;
}

.section2 {
    width: 100%;
    padding: 50px;
}

.apartment-details h2 {
    font-size: 24px;
    color: #333;
    margin-top: 20px;
}

.apartment-details img {
    display: block;
    margin: 20px auto;
    width: 80%;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.apartment-details p {
    font-size: 16px;
    color: #666;
    margin-bottom: 50px;
}

.apartment-details p:first-child {
    margin-top: 0;
}

.apartment-details .not-found {
    color: #ff0000;
    font-weight: bold;
}

.buy-back {
    display: flex;
    justify-content: center;
}

.buy-btn {
    background-color: #007bff;
    width: 30%;
    border: none;
    border-radius: 10px;
    height: 50px;
    color: #fff;
}

    </style>

</head>

<body>
<?php


    // Check if an apartment ID is provided in the URL
    if (isset($_GET['id'])) {
        $apartment_id = $_GET['id'];

        // Fetch apartment details from the database
        $sql = "SELECT * FROM apartment WHERE id = $apartment_id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $apartment = $result->fetch_assoc();
            // Display apartment details
            echo "<div class='apartment-details'>";
            echo "<div class='section1'>";
            echo "<img src='" . $apartment["image"] . "' width='200'>";
            echo "</div>";
            echo "<div class='section2'>";
            echo "<h2>" . $apartment["name"] . "</h2>";
            echo "<p>Address: " . $apartment["address"] . "</p>";
            echo "<p>City: " . $apartment["city"] . "</p>";
            echo "<p> $" . $apartment["description"] . "</p>";
            echo "<p> $" . $apartment["price"] . "</p>";
            echo "<div class='buy-back'>";
            echo "<button class='buy-btn'>Payment</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

        } else {
            echo "<p>Apartment not found.</p>";
        }
    } else {
        echo "<p>Apartment ID not provided.</p>";
    }
    ?>

</body>
<?php
include 'footer.php';?>

</html>