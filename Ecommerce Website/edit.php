<!-- PHP Session for when user is logged in -->
<?php
    session_start();
    //validates connection
    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: user.php");
    }
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
                <a href="userhome.php"><i class="fa-solid fa-user"></i></a>
            </section>
        </nav>
    </header>

    <!-- Change User Profile-->
    <section class="loginSession">
        <?php
            //Updates changes to database from given input
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $birthdate = $_POST['birthdate'];

                $id = $_SESSION['id'];
                
                $edit_query = mysqli_query($con,"UPDATE users SET Username='$username', Email='$email',
                    Birthdate='$birthdate', Password='$password' WHERE Id=$id") or die("Error Occured");

                if($edit_query){
                    echo "<div class='box-check'>
                    <p>Account Updated!</p>
                    <a href='userhome.php'><button class='btn'> Go Back</button>
                    </div> <br>";
                }
            }
            else{
                //Session Variable will remain same if submit is not clicked
                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");
                
                while($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['Username'];
                    $res_Email = $result['Email'];
                    $res_Birthdate = $result['Birthdate'];
                }
        ?>
        <form action="" method="post">
            <h1>Change Profile</h1>
            <section class="inputBoxUser">
                <input id="username" name="username" type="text" value=<?php echo $res_Uname?> autofocus>
            </section>

            <section class="inputBoxUser">
                <input id="email" name="email" type="text" value=<?php echo $res_Email?> 
                pattern="[a-z0-9_%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Format - example@yahoo.com">
            </section>

            <section class="inputBoxUser">
                <input id="birthdate" name="birthdate" type="text" 
                pattern="(3[01]|[12][0-9]|0?[1-9])(-)(1[0-2]|0?[1-9])\2([0-9]{2})?[0-9]{2}$" 
                value=<?php echo $res_Birthdate?> title="Format - MM-DD-YYYY">
            </section>

            <button type="submit" name="submit" class="btn" value="Create Account">Change</button>
            <br><br>
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
