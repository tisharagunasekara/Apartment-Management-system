<?php
include 'connect.php';
include 'header.php';

// Fetch available apartments from the database
$sql = "SELECT * FROM apartment WHERE available = 1";
$result = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Apartments</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 20px 0;
            display: flex;
            flex-wrap: wrap; /* Added to allow wrapping of apartment cards */
            justify-content: space-between;
            align-items: flex-start; /* Changed to align items at the start */
        }

       

        /* Apartment Card Styles */
        .apartment-card {
            border: 1px solid #ccc;
            background-color: rgb(218, 245, 255);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            margin-bottom: 20px;
            overflow: hidden;
            width: calc(33.33% - 35px); /* Adjusted width to fit 3 apartments in a row */
            margin-right: 20px; /* Added right margin to create spacing between cards */
            box-sizing: border-box; /* Added to include border and padding in width calculation */
        }

        .apartment-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .apartment-details {
            padding: 10px;
        }

        .apartment-title {
            font-size: 20px;
            margin-bottom: 5px;
            text-align: center;
        }

        .apartment-description {
            font-size: 16px;
            color: #666;
            margin-bottom: 5px;
            text-align: center;
        }

        .apartment-price {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
            text-align: center;
        }

        .view-btn {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Available Apartments</h2>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 3 == 0 && $count > 0) {
                    // Start a new row after every 3 apartments
                    echo "</div><div class='container'>";
                }
                echo "<div class='apartment-card'>";
                echo "<img src='" . $row["image"] . "' class='apartment-image'>";
                echo "<div class='apartment-detail'>";
                echo "<p class='apartment-title'>" . $row["name"] . "</p>";
                echo "<p class='apartment-description'>Address: " . $row["address"] . "</p>";
                echo "<p class='apartment-description'>City: " . $row["city"] . "</p>";
                echo "<p class='apartment-price'>Price: $" . $row["price"] . "</p>";
                echo "<div class='view-btn'>";
                echo "<a href='view_apartment.php?id=" . $row["id"] . "'><button style='background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;'>View</button></a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                $count++;
            }
        } else {
            echo "<p>No available apartments.</p>";
        }
        ?>
    </div>
</body>
<?php
include 'footer.php';?>

</html>
