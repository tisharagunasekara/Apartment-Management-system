<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

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

        .card {
            border: none;
            border-radius: 10px;
            padding: 30px;
            background-color: #CDF5FD;
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            font-size: 20px;
            width: 10%;
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

<body >

       <?php
    include 'sideBarAd.php';
    include 'connect.php';
    $a_count_sql = "SELECT COUNT(*) AS a_count FROM apartment";
    $a_count_result = $connect->query($a_count_sql);
    $ap_count = $a_count_result->fetch_assoc();

     $u_count_sql = "SELECT COUNT(*) AS u_count FROM users";
    $u_count_result = $connect->query($u_count_sql);
    $user_count = $u_count_result->fetch_assoc();
     ?>


    <div class="main-content">
        <div style="display: flex; justify-content: space-evenly; margin: 25px auto;">
            <div class="card">
                <p style="margin-bottom: 10px;"><?php echo $ap_count['a_count']; ?></p>
                <p>Apartment Count</p>
            </div>
            <div class="card">
                <p style="margin-bottom: 10px;"><?php echo $user_count['u_count']; ?></p>
                <p>User Count</p>
            </div>
        </div>
        <hr>
        <h2 style="text-align: center; margin: 50px auto;">Manage Admins</h2>
        <div class="container">

    <?php
    





    $sql = "SELECT * FROM admin";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Nic</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>";

        // Output data of each admin
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["a_id"] . "</td>";
            echo "<td>" . $row["a_name"] . "</td>";
            echo "<td><img src='img/" . $row["a_image"] . "' alt='admin_Image' style='max-width: 100px; max-height: 100px;'></td>";
            echo "<td>" . $row["a_email"] . "</td>";
            echo "<td>" . $row["a_nic"] . "</td>";
            echo "<td>" . $row["a_phone"] . "</td>";
            echo "<td>" . $row["a_username"] . "</td>";
            echo "<td>" . $row["a_password"] . "</td>";
            echo "<td>
            <div style='display: flex; justify-content: center;'>
                    <form method='post' action='manage_admin.php'>
                        <input type='hidden' name='a_id' value='" . $row["a_id"] . "'>
                        <button type='submit' class='delete-button'>Delete</button>
                    </form>
                    <form  method='get' action='update_admin.php'>
                            <input type='hidden' name='id' value='" . $row["a_id"] . "'>
                            <button type='submit' class='edit-button'>Edit</button>
                    </form>
                    </div>
                </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No admins found.";
    }
    ?>
</div>
    <div style="display: flex; justify-content: center; margin: 30px 0;">
        <form method="get" action="add_admin.php">
            <button type="submit" class="add-button">Add Admin</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['a_id'])) {
        // Get the admin ID from the POST data
        $admin_id = $_POST['a_id'];

        // Construct the delete query
        $delete_query = "DELETE FROM admin WHERE a_id = $admin_id";

        // Execute the delete query
        if ($connect->query($delete_query) === TRUE) {
            echo "<script>alert('Admin deleted successfully!');</script>";
            echo"<script>window.location.href='manage_admin.php'</script>";
            
        } else {
            echo "Error deleting admin: " . $connect->error;
        }
    }
    ?>

</div>

</body>

</html>