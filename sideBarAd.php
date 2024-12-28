<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Side bar</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="sidebar">
        <div class="top">
            <div class="sidebar-logo">
                
            </div>
            <i class='bx bx-menu' id="sidebar-btn"></i>
        </div>
        <div class="user">
            <?php

			include 'connect.php';

			session_start();

			$id = $_SESSION['a']['a_id'];

			if (!isset($id)) {

				header('location:signInAd.php');

			}

			$query = "SELECT * FROM `admin` WHERE a_id = '$id'";
			$rs = mysqli_query($connect, $query);


			$data = $rs->fetch_assoc();


			?>

            <div>
                <?php
				if (empty($data["a_image"])) {
					?>
                <img src="#" id="viewImg" class="user-img">
                <?php
				} else {
					?>
                <img src="img/<?php echo ($data["a_image"]); ?>" id="viewImg" class="user-img">
                <?php
				}
				?>
            </div>
            <div>
                <p class="bold"><?php echo ($data["a_name"]); ?>&nbsp;</p>
                <p><?php echo ($data["a_email"]); ?></p>
            </div>
        </div>
        <ul>
            <li>
                <a href="manage_admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Manage</span>
                </a>
                <span class="tooltip">Manage</span>
            </li>
            <li>
                <a href="add_admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Add</span>
                </a>
                <span class="tooltip">Add</span>
            </li>
            <li>
                <a href="apartment_view.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Apartments</span>
                </a>
                <span class="tooltip">Apartments</span>
            </li>
            <li>
                <a href="user_manage.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Users</span>
                </a>
                <span class="tooltip">Users</span>
            </li>
            <li>
                <a href="manage_review.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Review</span>
                </a>
                <span class="tooltip">Review</span>
            </li>
            <li>
                <a href="manage_complaint.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="nav-item">Complain</span>
                </a>
                <span class="tooltip">Complain</span>
            </li>
        </ul>

    </div>




    <script type="text/javascript">
    let btn = document.querySelector('#sidebar-btn')
    let sidebar = document.querySelector('.sidebar')

    btn.onclick = function() {
        sidebar.classList.toggle('active');
    };
    </script>

</body>

</html>