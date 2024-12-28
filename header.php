<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Your Website</title>
</head>
<body>
    <header>
        <div class="container">
            <h1>C&R Apartments</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="apartment.php">Apartments</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="review.php">Review</a></li>                    
                    <li><a href="add_complaint.php">Contact</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user']['name'];
                        $profileImage = $_SESSION['user']['profile_image'];
                        echo "<li><a href='user_profile.php'><img src='profile_img/$profileImage' alt='Profile Image' style='width: 40px; height: 40px; border-radius: 50%;'></a></li>";

                    } else {
                        echo '<li class="login"><a href="login.php">Login</a></li>';
                    }
                    
                    ?>
                </ul>
            </nav>
        </div>
    </header>

</body>

</html>