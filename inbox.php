<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox</title>
    <style type="text/css">
        /* Styles for the inbox container */
.inbox-container {
    width: 70%;
    margin: 30px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styles for the welcome message */
.inbox-container h2 {
    margin-bottom: 20px;
    color: #333;
}

/* Styles for individual complaints */
.complaint {
    margin-bottom: 20px;
    padding: 10px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.complaint p {
    margin: 0;
}

/* Styles for the reply section */
.complaint .reply {
    font-style: italic;
    color: #888;
    background-color: rgb(231, 41, 41, 0.1);
    border-radius: 10px;
    padding: 10px;
}

    </style>

</head>

<body>

    <div class="inbox-container">
        <?php


        include 'connect.php';


        if (!isset($_SESSION['user'])) {

            header("Location: login.php");
            exit();
        } else {
            echo "<h2>Welcome " . $_SESSION['user']['name'] . "</h2>";


            $user_id = $_SESSION['user']['id'];


            $query = "SELECT * FROM complaint WHERE u_id = '$user_id'";
            $result = mysqli_query($connect, $query);


            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='complaint'>";
                    echo "<p>Email: " . $row['u_email'] . "</p>";
                    echo "<p>Complaint: " . $row['complaint'] . "</p>";
                    if (!empty($row['reply'])) {
                        echo "<p class='reply'>Reply: " . $row['reply'] . "</p>";
                    } else {
                        echo "<p class='reply'>No reply</p>";
                    }
                    echo "</div>";
                }
            } else {

                echo "<p>No complaints found for this user.</p>";
            }


            mysqli_close($connect);
        }
        ?>
    </div>
</body>

</html>