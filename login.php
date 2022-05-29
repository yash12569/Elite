<?php 

include 'config.php';
session_start();

error_reporting(0);


if (isset($_SESSION['username'])) {
    header("Location: index.html");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM registration WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: index.html");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- 
      - custom css link
    -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="profile.css">
    <!-- 
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">

</head>

<body>

    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <a href="index.html" class="logo">
                <img src="./assets/images/logo.png" alt="ELITE logo" height="40px" width="160px">
            </a>

        </div>
    </header>


    <!-- 
        - Blog text
      -->

    <section class="section hero" id="home" >
            <div class="container">
                <div class="title">Login</div>
                <div class="content">
                    <form method="POST" action="">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Username</span>
                                <input type="text" name="username" placeholder="Enter your username"  required>
                            </div>
                            <div class="input-box">
                                <span class="details">Password</span>
                                <input type="password" name="password" placeholder="Enter your password"  required>
                            </div>
                        </div>
                        
                        <div class="button">
                            <input type="submit" name="submit" value="Login">
                        </div>
                        <h4 class="login-register-text">Don't have an account? </h4><a href="createAProfile.php">Register Here</a>
                    </form>
                </div>
            </div>




        

    </section>

</body>

</html>