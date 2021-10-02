<?php
$result=false;
if(isset($_POST['name'])){
$server="localhost";
$username="root";
$password="";
$db="aritra";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
     die("CONNECTION FALIED".mysqli_connect_error());
}

$name=$_POST['name'];
$dept=$_POST['dept'];
$class=$_POST['class'];
$roll=$_POST['roll'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$query="SELECT * FROM `picnic_ju`";
$data=mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
$flag=true;

while($total>0){
    $R=mysqli_fetch_assoc($data);
    //echo "<h2 style='color:yellow'>".$R['ROLL']."</h2>";
    if(strcmp($R['ROLL'],$roll)==0)
    {
        echo "<script>alert('Record Match Found!!!...You Have Already Filled Up The Form...THANK YOU!!!....')</script>";
        $flag=false;
        /*echo "<h1 style='color:RED'>Record Match Found!!!...<br>You Have Already Filled Up The Form...<br>THANK YOU!!!....</h1>";
        echo "<a href='index.php' style='border:2px solid red;border-radius:10px;padding:5px;text-decoration:none;color:red'>CLICK TO RETURN</a>";

        die("");*/
    }
    $total-=1;
}
if($flag)
{
    $sql="INSERT INTO `picnic_ju` (`NAME`, `DEPT`, `CLASS`, `ROLL`, `EMAIL`, `PHONE`, `DATE/TIME`) VALUES ('$name', '$dept', '$class', '$roll', '$email', '$phone', current_timestamp());";
        
    $result= mysqli_query($conn,$sql);
    if(!$result)
    {
        echo "<h1>ACCESS DENIED</h1>";
    }
    else{
         echo "<script>alert('Wel Done!...Your Respond Has Been Successfully Submitted...THANK YOU!!!....')</script>";
         
        /*echo "<h1 style='color:green;'>Wel Done!...<br>Your Respond Has Been Successfully Submitted...<br>THANK YOU!!!....</h1><br>";
        echo "<a href='index.php' style='border:2px solid green;border-radius:10px;padding:5px;text-decoration:none;color:green'>CLICK TO RETURN</a>";
        die("");*/
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>picnic_ju</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h1>WELCOME TO JADAVPUR UNIVERSITY</h1>
        <h3>THIS PICNIC IS SPONSORED BY JADAVPUR UNIVERSITY</h3>
        <p>***PLEASE FILL UP THE FORM CAREFULLY***</p>
        <form action="index.php" method="post" id="form" name="form" onsubmit="return validateForm()">
            <input id="name" name="name" type="text" placeholder="FULL NAME (IN CAPITAL LETTERS )" required><b><lebel id="errorname"></lebel></b>
            <input id="dept" name="dept" type="text" placeholder="DEPERTMENT NAME (IN CAPITAL LETTERS )" required><b><lebel id="errordept"></lebel></b>
            <input id="class" name="class" type="text" placeholder="CURRENT CLASS (IN CAPITAL LETTERS )" required><b><lebel id="errorclass"></lebel></b>
            <input id="roll" name="roll" type="text" placeholder="CLASS ROLL NUMBER" required><b><lebel id="errorroll"></lebel></b>
            <input id="email" name="email" type="email" placeholder="EMAIL ID" required><b><lebel id="erroremail"><lebel></b>
            <input id="phone" name="phone" type="phone" placeholder="MOBILE NUMBER" required><b><lebel id="errorphone"></lebel></b>
            <input class="btn" type="submit" name="submit" value="SUBMIT" style="padding-top:2px;">
        </form><br><br>
        <a href="update_check.php" class="btn">UPDATE INFO</a>
        <a href="table.php" class="btn">LIST_OF_PEOPLE</a>
        <a href="delete.php" class="btn">DELETE INFO</a>
    </div>
    <script src="index.js"></script>
</body>
</html>

