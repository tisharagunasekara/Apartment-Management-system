<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Review</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: center;
        }
        form {
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            background-color: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    

    <?php
    include 'sideBarAd.php';
    include 'connect.php';?>
<div class="main-content">
<h2 style="text-align: center; margin: 30px auto;">Edit Review</h2>
<div class="container">
    <?php

    // Check if review ID is provided in the URL
    if (!isset($_GET['id'])) {
        echo "Review ID not provided.";
        exit;
    }

    $review_id = $_GET['id'];

    // Fetch review details based on the ID
    $sql = "SELECT * FROM reviews WHERE id = $review_id";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the review details in a form
        ?>
        <form method="POST" action="update_review.php">
            <input type="hidden" name="review_id" value="<?php echo $row['id']; ?>">
            <textarea name="new_comment" required><?php echo $row['comment']; ?></textarea><br>
            <button type="submit">Update Review</button>
        </form>
        <?php
    } else {
        echo "Review not found.";
    }
    ?>
</div>
</div>
</body>

</html>