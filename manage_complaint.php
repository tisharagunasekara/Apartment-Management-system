<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Complaints</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
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
        <h2 style="text-align: center; margin: 20px auto;">All Complaints</h2>
        <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Complaint</th>
                    <th>Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connect.php';

                // Retrieve all complaints from the database
                $query = "SELECT * FROM complaint";
                $result = mysqli_query($connect, $query);

                // Check if there are any complaints
                if (mysqli_num_rows($result) > 0) {
                    // Display each complaint in a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['u_email'] . "</td>";
                        echo "<td>" . $row['complaint'] . "</td>";
                        // Check if the reply field is empty
                        if (!empty($row['reply'])) {
                            echo "<td>" . $row['reply'] . "</td>";
                        } else {
                            echo "<td><button class='add-button'><a style='text-decoration:none; color: white;' href='reply_complaint.php?id=" . $row['id'] . "'>Reply</a></button></td>";
                        }
                        // Add delete button in the action column
                        echo "<td>";
                        echo "<form action='manage_complaint.php' method='POST'>";
                        echo "<input type='hidden' name='complaint_id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' class='delete-button' name='delete' value='Delete'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>

<?php
include_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {

    $complaint_id = $_POST['complaint_id'];


    $query = "DELETE FROM complaint WHERE id = '$complaint_id'";

    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Complaint deleted successfully!');</script>";
        echo"<script>window.location.href='manage_complaint.php'</script>";
        exit();
    } else {

        echo "Error deleting record: " . mysqli_error($connect);
    }
}

mysqli_close($connect);
?>