<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Complaint</title>
    <style type="text/css">

        body {
            background-image: url('');
        }
        /* Styles for the complaint container */
.complaint-container {
    width: 400px;
    margin: 150px auto;
}

/* Styles for the form */
.complaint-container form {
    display: flex;
    flex-direction: column;
}

/* Styles for input fields */
.complaint-container input[type='email'],
.complaint-container input[type='text'],
.complaint-container input[type='submit'] {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

/* Styles for the submit button */
.complaint-container input[type='submit'] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
}

.complaint-container input[type='submit']:hover {
    background-color: #45a049;
}

/* Styles for the inbox button */
.complaint-container a {
    text-decoration: none;
}

.complaint-container button {
    padding: 8px 16px;
    background-color: #008CBA;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.complaint-container button:hover {
    background-color: #005f79;
}

    </style>
    
</head>
<?php include 'header.php'; ?>
    <!-- Include header.php within the head section -->
<body>
    <div class="complaint-container">
        <form action="add_complaint.php" method="post">
            <?php
            if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['id'];
                $user_email = $_SESSION['user']['email'];
                echo "<input type='hidden' name='id'  value='$user_id' readonly>";
                echo "<input type='email' name='email' placeholder='Enter your email' value='$user_email' readonly>";
            } else {
                // If not set, show a regular email input field
                echo "<input type='email' name='email' placeholder='Enter your email'>";
            }
            ?>
            <input type="text" name="complaint" placeholder="Enter your complaint">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if (isset($_SESSION['user'])) {
            // If set, show the inbox button
            echo "<a href='inbox.php'><button>Inbox</button></a>";
        }
        ?>
    </div>
    <?php
include 'footer.php';?>
</body>

</html>

<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $user_id = $_POST['id'];
    $complaint = $_POST['complaint'];
    $email = $_POST['email'];
    $query = "INSERT INTO complaint (u_id, complaint, u_email) VALUES ('$user_id','$complaint', '$email')";
    $result = mysqli_query($connect, $query);
    if ($result) {
        echo "<script>alert('Complaint submitted successfully!');</script>";
        echo "<script>window.location.href='add_complaint.php'</script>";
    } else {
        echo "Failed to add complaint";
    }
}
?>