<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .container {
            display: flex;
            justify-content: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff; /* Blue color for table header */
            color: white;
        }

        

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }

        

        /* Style for edit button */
        .edit-button {
            background-color: #28a745; /* Green color for edit button */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 5px;
        }

        .delete-button {
            background-color: #C40C0C; /* Green color for edit button */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 5px;
        }

        .add-button {
            background-color: #007bff; /* Blue color for submit button */
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            margin: 5px;
        }


        .edit-button:hover {
            background-color: #218838; /* Darker shade of green on hover */
        }
    </style>
</head>

<body>
    

    <?php
    include 'sideBarAd.php';
    include 'connect.php';?>


<div class="main-content">

    <h2 style="text-align: center; margin: 20px auto;">Admin Dashboard</h2>
    <div class="container">
    <?php

    // Fetch reviews from the database
    $sql = "SELECT * FROM reviews";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Display reviews in a table
        echo "<table>";
        echo "<tr><th>User</th><th>Email</th><th>Comment</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["user_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["comment"] . "</td>";
            echo "<td><a href='edit_review.php?id=" . $row["id"] . "'><button class='edit-button'>Edit</button></a> | <a href='delete_review.php?id=" . $row["id"] . "'><button class='delete-button'>Delete</button></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No reviews found.</p>";
    }
    ?>

</div>

</div>
</body>

</html>