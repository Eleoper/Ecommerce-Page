<?php
    //Start session to save user data
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage - Online Marketplace</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="myscripts.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav>
            <!-- Side bar of header on left side -->
            <section id="mySideBar" class="sideBar">
                <section class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" placeholder="Search . . .">
                </section>
                <a class="closebtn" onclick="closeNav()">&times;</a>
                <ul>
                    <li><a href="shirts.html">Shirts</a></li>
                    <li><a href="shorts.html">Shorts</a></li>
                    <li><a href="sweaters.html">Sweaters</a></li>
                </ul>
            </section>
            <!-- Logo of the header in middle -->
            <span class="sideBarIcon" onclick="openNav()">&#9776;</span>
            <section class="logo">
                <a href="index.html"><img src="../Ecommerce Website/images/aboutLogo.png" alt="THREAD HUB" style="width: 17vh;"></a>
            </section>
            <!-- Navigation bar on the right side of header -->
            <section class="navBar">
                <a href="cart.html"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="user.html"><i class="fa-solid fa-user"></i></a>
            </section>
        </nav>
    </header>
    <!-- PHP Section -->
    <?php
        //Verify Connection
        include("php/config.php");

        //Check username and password
        if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $password = mysqli_real_escape_string($con,$_POST['password']);

            $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password'") or die("Select Error");
            $row = mysqli_fetch_assoc($result);

            //if username & password found, assign data for userhome
            if(is_array($row) && !empty($row)){
                $_SESSION['valid'] = $row['Email'];
                $_SESSION['username'] = $row['Username'];
                $_SESSION['birthdate'] = $row['Birthdate'];
                $_SESSION['id'] = $row['Id'];
            }
            //no row found, gives error
            else{
                echo "<div class='box-check'>
                        <p>Wrong Username or Password</p>
                        <a href='user.php'><button> Go Back</button>
                    </div> <br>; ";
            }
            if(isset($_SESSION['valid'])){
                header("Location: userhome.php");
            }

        }else{
    ?>
    <!-- Login Session -->
    <section class="loginSession">
        <form action="" method="post">
            <h1>Login</h1>
            <label>Email</label>
            <section class="inputBoxUser">
                <input id="email" name="email" type="text" placeholder="Email" required autofocus>
            </section>
            
            <label>Password</label>
            <section class="inputBoxUser">
                <input id="password" name="password" type="password" placeholder="Password" required >
            </section>
            <button type="submit" name="submit">Login</button>
            <br>
            <section class="registerLink">
                <p>
                    Don't have an Account?
                    <br>
                    <a class="userLinks" href="register.php" style="color:red;">Sign Up Now</a>
                </p>
            </section>
        </form>
        <?php } ?>
    </section>
    
    <!-- Footer Section -->
    <footer>
        <section class="footerTop">
            <a href="https://www.instagram.com/eleoperr/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://twitter.com/?lang=en"><i class="fa-brands fa-x-twitter"></i></a>
        </section>
        <section class="footerMid">
            <a href="about.html">About Us</a>
            <a href="policy.html">Policies</a>
            <a href="contact.html">Contact Us</a>
        </section>
        <section class="footerBottom">
            <p>Copyright &copy;2024 | Designed By SmashBros</p>
        </section>
    </footer>
</body>
</html>
