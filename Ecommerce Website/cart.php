<?php
if($_POST){
	if (!$fname || !$lname || !$address || !$zip || !$country) {
        echo''}

    else{
        
    }
}
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $adress = $_POST['address'];
    $zip = $_POST['zip'];
    $country = $_POST['country'];

}

$host = "localhost";
$username = "cartDB";
$password = "";
$dbname = "cartDB";

//CREAT DB connection
$conn = new mysqli($host, $username, $password, $dbname);

//Check connection
if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

//create a data entry query
$sql = "INSERT INTO cartform (id, fname, lname, adress, zip, country) VALUES ('0', '$fanme', '$lname', '$address', '$zip', '$country')";

//send query to database
$rs = mysqli_query($con, $sql);
if($rs){
    echo "Entries added!";
}

mysqli_close($con);
?>
