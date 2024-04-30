
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


if($_POST){
	if (!$name || !$message || !$email) {
		//check if Feedback form is missing information
		 echo'
         <!DOCTYPE html>
         <html lang="en">
         <head>
             <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
             <title>Cart - Online Marketplace</title>
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
             <main class="cart-content">
             <h2>Your Feedback was not submitted due to some errors.<br />
            Please try again. Thank you!</h2>
            <p>Go back to the <a href="index.html"><i>homepage.</i></a></p>
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
        </html>';
	}
	else{//if good, create database in local host and echo thank you message
        $host = "localhost";
        $username= "feedDB";
        $password = "";
        $dbname = "feedDB";

        //CREAT DB connection
        $conn = new mysqli($host, $username, $password, $dbname);

        //Check connection
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }

        //create a data entry query
        $sql = "INSERT INTO feedDB (id, name, email, message) VALUES ('0', '$name', '$email', '$message')";

        //send query to database
        $rs = mysqli_query($con, $sql);
        if($rs){
            echo "Entries added!";
        }

        mysqli_close($con);
        echo'
             <!DOCTYPE html>
             <html lang="en">
             <head>
                 <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
                 <title>Cart - Online Marketplace</title>
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
                 <main class="cart-content">
                 <h2>Your Feedback has been Submitted.<br />
                Thank you!</h2>
                <p>Go back to the <a href="index.html"><i>homepage.</i></a></p>
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
            ';
        
	}
}
?>
