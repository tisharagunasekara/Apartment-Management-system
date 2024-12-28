<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../review.css" />
    <title>Update Admin</title>

    <style type="text/css">
        
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:wght@300&display=swap');

        *{
            padding: 0;
            margin: 0;
            font-family: "Open Sans", sans-serif;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-outliner {
            background-color: #CDF5FD;
            padding: 30px;
            width: 60%;
        }

        .main-form {
            display: flex;
            justify-content: space-around;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-bottom: 20px;
        }
        .form-group label {
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            height: 30px;
            border: none;
            border-radius: 10px;
        }

        .section1 {
            width: 100%;
            margin: 0 15px;
        }

        .section2 {
            width: 100%;
            margin: 0 15px;
        }

        .update-group {
            display: flex;
            justify-content: center;
        }

        .update-btn {
            width: 50%;
            border: none;
            background-color: #007bff;
            border-radius: 10px;
            height: 35px;
        }


    </style>
</head>

<body>

    <?php
    include 'sideBarAd.php'; ?>
    <div class="main-content">
        <h2 style="text-align: center; margin: 0 auto;">Manage Admins</h2>
        <div class="container">

    <?php
    // Include database connection
    include 'connect.php';

    

    // Check if admin ID is set
    if (isset($_GET['id'])) {
        // Fetch admin details based on ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM admin WHERE a_id = $id";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>

            <div class="form-container">
            <div class="form-outliner">
            <form action="edit_admin.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['a_id']; ?>">
                <div class="main-form">
                    <div class="section1">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo isset($row['a_name']) ? $row['a_name'] : ''; ?>"
                        required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"
                        value="<?php echo isset($row['a_email']) ? $row['a_email'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nic">Nic:</label>
                    <input type="text" id="nic" name="nic" value="<?php echo isset($row['a_nic']) ? $row['a_nic'] : ''; ?>"
                        required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone"
                        value="<?php echo isset($row['a_phone']) ? $row['a_phone'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"
                        value="<?php echo isset($row['a_username']) ? $row['a_username'] : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"
                        value="<?php echo isset($row['a_password']) ? $row['a_password'] : ''; ?>" required>
                </div>
            </div>
            <div class="section2">
                <div class="form-group">
                    <label for="profileImage">Profile Image:</label>
                    <input type="file" id="profileImage" name="profileImage">
                    <img id="imagePreview" src="img/<?php echo isset($row['a_image']) ? $row['a_image'] : ''; ?>" alt="Preview"
                        style="max-width: 200px; max-height: 200px;">
                </div>
            </div>
            </div>
                <div class="update-group">
                    <input class="update-btn" type="submit" value="Update Admin">
                </div>
            </form>
        </div>
    </div>
            <?php
        } else {
            echo "Admin not found.";
        }
    } else {
        echo "Admin ID not specified.";
    }
    ?>
</div>
</div>


    <script>
        document.getElementById('profileImage').addEventListener('change', function (event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function () {
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        });
    </script>

</body>

</html>