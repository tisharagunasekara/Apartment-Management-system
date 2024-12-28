<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Disease</title>
<style type="text/css">
    *{
            margin: 0;
            padding: 0;
        }
        .reply-container {
            display: flex;
            justify-content: center;
        }
        .reply-container {
            width: 60%;
            margin: 100px auto;
            padding: 60px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reply-container form {
            display: flex;
            flex-direction: column;
        }

        /* Styles for labels */
        .reply-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .reply-container input[type='text'],
        .reply-container textarea {
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        .reply-container input[type='submit'] {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .reply-container input[type='submit']:hover {
            background-color: #45a049;
        }

</style>
</head>

<body>
    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 20px auto;">Reply Complaints</h2>
    <div class="reply-container">
        

        <?php

        include_once 'connect.php';


        if (isset($_GET['id']) && !empty($_GET['id'])) {

            $complaint_id = $_GET['id'];


            $query = "SELECT * FROM complaint WHERE id = '$complaint_id'";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>

                <!-- Display the edit form -->
                <form action="reply.php" method="POST">
                    <input type="hidden" name="complaint_id" value="<?php echo $row['id']; ?>">

                    <label for="name">Email:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['u_email']; ?>" required>

                    <label for="complaint">Complaint:</label>
                    <textarea id="complaint" name="complaint" rows="4" cols="50"
                        required><?php echo $row['complaint']; ?></textarea>

                    <label for="reply">Reply:</label>
                    <textarea id="reply" name="reply" rows="4" cols="50" required><?php echo $row['reply']; ?></textarea>

                    <input type="submit" name="update" value="Reply">
                </form>

                <?php
            } else {
                echo "Id not found.";
            }
        } else {
            echo "Invalid request. Please provide a valid disease ID.";
        }

        mysqli_close($connect);
        ?>
    </div>
</div>
</body>

</html>