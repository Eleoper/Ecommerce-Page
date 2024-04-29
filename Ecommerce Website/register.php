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
                <a href="user.php"><i class="fa-solid fa-user"></i></a>
            </section>
        </nav>
    </header>

    <!-- PHP Section -->
    <?php
    //verifies php connection
    include("php/config.php");

    //sets variables from given data

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $password = $_POST['password'];
        
        //check if email unique
        $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
                
        //email in used, gives back button
        if(mysqli_num_rows($verify_query) != 0 ){
            echo "<div class='box-check'>
                        <p>Email has been used already. Try Again.</p>
                        <a href='javascript:self.history.back()'><button class='btn'> Go Back</button>
                        </div> <br>";
        }

        //unique email, added into table
        else{
            mysqli_query($con,"INSERT INTO users(Username,Email,Birthdate,Password) Values('$username','$email','$birthdate','$password')") or die("Error Occurred");
            
            echo "<div class='box-check'>
                    <p>Registration Complete! You can now log in</p>
                    <a href='user.php'><button class='btn'> Log In Now</button>
                </div> <br>";
        }
    }else{
    ?>

    <!-- Login Session -->
    <section class="loginSession">

        <form action="" method="post">
            <h1>Sign Up</h1>
            <section class="inputBoxUser">
                <input id="username" name="username" type="text" placeholder="Username" required autofocus>
            </section>

            <section class="inputBoxUser">
                <input id="email" name="email" type="text" placeholder="Email" required 
                pattern="[a-z0-9_%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Format - example@yahoo.com">
            </section>

            <section class="inputBoxUser">
                <input id="birthdate" name="birthdate" type="text" 
                pattern="(3[01]|[12][0-9]|0?[1-9])(-)(1[0-2]|0?[1-9])\2([0-9]{2})?[0-9]{2}$" 
                placeholder="Birthdate [MM-DD-YYYY]" title="Format - MM-DD-YYYY">
            </section>

            <section class="inputBoxUser">
                <input id="password" name="password" type="password" placeholder="Password" required >
            </section>
              <button type="submit" name="submit" class="btn" value="Create Account">Create Account</button>
              <br>
              <section class="registerLink">
                <p>
                    Already a member?
                    <br>
                    <a class="userLinks" href="user.php" style="color: red;">Log In</a>
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
