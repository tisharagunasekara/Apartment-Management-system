<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Apartments</title>
    <style>
        .apartment_view {
            display: flex;
            justify-content: center;
            margin: 60px auto;
        }
        table {
            width: 80%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .action-links a {
            margin-right: 8px;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .delete-btn {
            background-color: #C40C0C;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <?php
    include 'connect.php';
    include 'header.php';?>
    
    <div style="display:flex; justify-content: center; margin-bottom: 60px; margin-top: 60px;">
        <a href="add_apartment.php"><button class="edit-btn">Add New Apartment</button></a>
    </div>
    
<?php
    // Check if user is logged in
    if (!isset($_SESSION['user'])) {
        header("Location: login.php"); // Redirect to login page if not logged in
        exit;
    }

    $user_id = $_SESSION['user']['id'];

    // Fetch apartments owned by the logged-in user
    $sql = "SELECT * FROM apartment WHERE userid = $user_id";
    $result = $connect->query($sql);
    echo "<div class='apartment_view'>";
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Image</th><th>Address</th><th>City</th><th>Price</th><th>Available</th><th>Actions</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td><img src='" . $row["image"] . "' width='100'></td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>$" . $row["price"] . "</td>";
            echo "<td>" . ($row["available"] ? 'Yes' : 'No') . "</td>";
            echo "<td class='action-links'>";
            echo "<a href='edit_apartment.php?id=" . $row["id"] . "'><button class='edit-btn'>Edit</button></a>";
            echo "<a href='delete_apartment.php?id=" . $row["id"] . "'><button class='delete-btn'>Delete</button></a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No apartments found.</p>";
    }
    echo"</div>";
    ?>
    

</body>
<?php
include 'footer.php';?>

</html>