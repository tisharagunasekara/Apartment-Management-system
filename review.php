<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .review-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            margin: 20px 60px;
        }

        .review-card {
            flex: 0 0 calc(23% - 50px);
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            text-align: center;
        }

        .review-card p {
            margin: 0;
        }

        .review-card img {
            width: 50px;
            border-radius: 50%;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .review-card p:not(:last-child) {
            margin-bottom: 10px;
        }

        .review-container {
            display: flex;
            justify-content: center;
        }

        .review-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <?php
    include 'connect.php';
    include 'header.php';
?>
<div class="review-container">
<h2>Reviews</h2>
</div>

<?php
    // Fetch reviews from the database
    $sql = "SELECT * FROM reviews";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Output reviews if there are any
        echo "<div class='review-row'>";
        $count = 0;
        while ($row = $result->fetch_assoc()) {
            echo "<div class='review-card'>";
            echo "<img src='profile_img/" . $row["user_image"] . "' alt='User Image' width='50px'>";
            echo "<p>" . $row["comment"] . "</p>";
            echo "<p style='color: gray;'> " . $row["user_name"] . "</p>";
            
            
            echo "</div>";

            $count++;
            // If four reviews are displayed, start a new row
            if ($count % 4 == 0) {
                echo "</div><div class='review-row'>";
            }
        }
        echo "</div>"; // Close the last row
    } else {
        // Output a message if there are no reviews
        echo "<p>No reviews found.</p>";
    }
    ?>

    <div class="review-container">
    <button class="review-btn" onclick="window.location.href='add_review.php'">Give Us Reviews</button>
    </div>

</body>
<?php
include 'footer.php';?>

</html>
