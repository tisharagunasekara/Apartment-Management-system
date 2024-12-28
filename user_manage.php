<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user manage </title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@300&display=swap');

        *{
            padding: 0;
            margin: 0;
            font-family: "Open Sans", sans-serif;
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
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto;">Manage Admins</h2>
        <div class="container">
    <?php

    include 'connect.php';
    $sql = "SELECT * FROM users";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        // Display users in a table
        echo "<table >";
        echo "<tr><th>name</th><th>email</th><th>phone</th><th>nic</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["nic"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }

    // Close the database connection
    $connect->close();

    ?>
</div>
</div>

</body>

</html>