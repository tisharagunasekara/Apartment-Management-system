<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>

    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 90%;
        margin: 0 auto;
        padding: 20px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    header {
        background-color: #071952;
        color: #fff;
        padding: 10px 0;
    }

    h1 {
        margin: 0;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        padding: 10px;
    }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Apartments</h1>
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
                        echo "<li><a href='login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Your website content goes here -->
</body>

</html>