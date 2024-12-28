<?php
include 'connect.php';
include 'header.php';
$u = $_SESSION['user'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = {$u['id']}";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user['id'] = $row['id']; // Add this line to fetch the user ID
    $user['name'] = $row['name'];
    $user['nic'] = $row['nic'];
    $user['phone'] = $row['phone'];
    $user['address'] = $row['address'];
    $user['dob'] = $row['dob'];
    $user['email'] = $row['email'];
    $user['username'] = $row['username'];
    $user['password'] = $row['password'];

    $user['profile_image'] = $row['profile_image']; // Add this line to fetch the profile image
} else {
    echo "No user found!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style type="text/css">
        /* CSS for User Profile Form */

    .main-container {
        display: flex;
        justify-content: center;

        flex-direction: column;
    }
.form {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

div {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="date"],
input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.update-btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.update-btn:hover {
    background-color: #0056b3;
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

.delete-btn:hover {
    background-color: #E72929;
}

#imagePreview {
    max-width: 200px;
    max-height: 200px;
    border-radius: 5px;
    margin-top: 10px;
}

.main-section {
    display: flex;
    justify-content: center;
}
.section1 {
    width:50%;
    margin: 20px;
}

.form-button {
display: flex;
justify-content: center;
}

.top {
    display: flex;
    justify-content: space-between;
    margin: 50px 160px;
}



    </style>
</head>

<body>
    <div class="main-container">
    <div class="top">
    <h1>User Profile</h1>
    <button class="update-btn" onclick="window.location.href='add_apartment.php'">Add Apartment</button>
    <button class="update-btn" onclick="window.location.href='seller_apartments.php'">Apartments</button>
    </div>

    <form class="form" method="POST" action="user_profile_update.php" enctype="multipart/form-data">
        <div class="main-section">
            <div class="section1">

        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required>
        </div>
        <div>
            <label for="nic">NIC:</label>
            <input type="text" id="nic" name="nic" value="<?php echo $user['nic']; ?>" required>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>" required>
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $user['address']; ?>" required>
        </div>
        <div>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" value="<?php echo $user['dob']; ?>" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        </div>
<div class="section1">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>
        </div>
        </br>
        <div>
            <label for="profile_image">Profile Picture:</label>
            <input type="file" id="profile_image" name="profile_image" accept="image/*">
            <?php if (isset($user['profile_image']) && !empty($user['profile_image'])): ?>
                <img id="imagePreview" src="profile_img/<?php echo $user['profile_image']; ?>" alt="Profile Image"
                    style="max-width: 200px; max-height: 200px;">
            <?php else: ?>
                <img id="imagePreview" src="" alt="Profile Image"
                    style="max-width: 200px; max-height: 200px; display: none;">
            <?php endif; ?>
        </div>
        </div>
</div>
        <div class="form-button">
        <input class="update-btn" type="submit" value="Update Profile">
    </div>
    </form>
    <div class="form-button">
    <form method="POST" action="delete_user.php">
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <input class="delete-btn" type="submit" value="Delete Account">
    </form>
</div>
</div>
</body>
<?php
include 'footer.php';?>
<script>
    document.getElementById('profile_image').addEventListener('change', function (event) {
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

</html>