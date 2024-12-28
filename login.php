<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
   
}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-image: url('./apartment_image/loginImg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: -1;
}
.login-box{
    background-color:rgba(245, 245, 245, 0.67);
    border-radius: 10px;
    padding: 20px; 
    display: flex;
    justify-content: center;
    flex-direction: column;
    width: 440px;
    height: 480px;
    padding: 30px;
    
}
.login-header{
    text-align: center;
    margin: 20px 0 40px 0;
}
.login-header header{
    color: #333;
    font-size: 30px;
    font-weight: 600;
}
.input-box .input-field{
    width: 100%;
    height: 60px;
    font-size: 17px;
    padding: 0 25px;
    margin-bottom: 15px;
    border-radius: 30px;
    border: none;
    box-shadow: 0px 5px 10px 1px rgba(0,0,0, 0.05);
    outline: none;
    transition: .3s;
}
::placeholder{
    font-weight: 500;
    color: #222;
}
.input-field:focus{
    width: 105%;
}
.forgot{
    display: flex;
    justify-content: space-between;
    margin-bottom: 40px;
}
section{
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #555;
}
#check{
    margin-right: 10px;
}
a{
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
}
section a{
    color: #555;
}
.input-submit{
    position: relative;
}
.submit-btn{
    width: 100%;
    height: 60px;
    background: #222;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: .3s;
}
.input-submit label{
    position: absolute;
    top: 45%;
    left: 50%;
    color: #fff;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
}
.submit-btn:hover{
    background: #000;
    transform: scale(1.05,1);
}
.sign-up-link{
    text-align: center;
    font-size: 15px;
    margin-top: 20px;
}
.sign-up-link a{
    color: #000;
    font-weight: 600;
}

    </style>
</head>

<body>
<div class="login-box">
    <div class="login-header">
        <header>Login</header>
    </div>
    <form method="POST" action="login.php">
        <div class="input-box">
            <input type="text" id="username" name="username" class="input-field" placeholder="User Name" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" id="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="forgot">
            <section>
                <input type="checkbox" id="check" name="remember">
                <label for="check">Remember me</label>
            </section>
            <section>
                <a href="#">Forgot password</a>   
            </section>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit">Sign In</button>
        </div>
        <div class="sign-up-link">
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </form>
</div>

    <?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check if the username and password match the user table
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION['user'] = $user;

            // Check user role and redirect accordingly
            if ($user['role'] == 'seller') {
                echo "<script>alert('login success');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit;
            } else {
                echo "<script>alert('login success');</script>";
                echo "<script>window.location.href = 'index.php';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    }
    ?>
</body>

</html>
