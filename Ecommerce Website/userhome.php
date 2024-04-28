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
                <a href="user.php"><i class="fa-solid fa-user"></i></a>
            </section>
        </nav>
    </header>

    <!-- User Settings Section -->
    <main class="mainContent">
        <!-- Php Section -->
        <?php 

            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT * FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Id = $result['Id'];
                $res_Birthdate = $result['Birthdate'];
            }

        ?>
        <section>
            <!-- Welcome Box -->
            <div class="box">
                <a href="php/logout.php">Hello <strong><?php echo $res_Uname ?></strong>, Welcome. Click to Log out.</a>
            </div>
            <!-- Id Box -->
            <div class="box">
                <p> ID : <strong><?php echo $res_Id ?></strong></p>
            </div>
            <!-- Birthdate Box -->
            <div class="box">
                <p> Birthdate : <strong><?php echo $res_Birthdate ?></strong></p>
            </div>
            <!-- Email Box -->
            <div class="box">
                <p>Email : <strong><?php echo $res_Email ?></strong></p>
            </div>
            <!-- Change Profile -->
            <div class="box">
                <a href="edit.php"><strong>Change Profile</strong></p>
            </div>
        </section>
    </main>

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
