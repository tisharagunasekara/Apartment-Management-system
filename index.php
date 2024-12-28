<?php
include 'connect.php';
include 'header.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style type="text/css">
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.hero {
    position: relative;
    width: 100%;
    height: 100vh;
    background-image: url('img/hero.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
}

.hero-content {
    text-align: center;
}

.hero-content h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6f61;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #e55f52;
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



<section class="hero">
    <div class="hero-content">
        <h1>Welcome to Our Website</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="#" class="btn">Learn More</a>
    </div>
</section>

<section>

    <h2 style="text-align: center; margin: 50px auto;">Latest Apartments</h2>
    <?php
    $sql = "SELECT * FROM apartment WHERE available = 1 LIMIT 3"; // Limit the query to retrieve only the first three apartments
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $count = 0;
        echo "<div class='container'>"; 
        while ($row = $result->fetch_assoc()) {
            if ($count % 3 == 0 && $count > 0) {
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
        echo "</div>"; // End container
    } else {
        echo "<p>No available apartments.</p>";
    }
?>


</section>
<?php
include 'footer.php';?>
</body>
</html>
