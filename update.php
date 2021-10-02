<?php
session_start();
$roll=$_SESSION['roll'];
    if(isset($_POST['Name']))
    {
        $server="localhost";
        $username="root";
        $password="";
        $db="aritra";

        $conn=mysqli_connect($server,$username,$password,$db);
        if(!$conn){
            die("CONNECTION FALIED".mysqli_connect_error());
        }

        $name=$_POST['Name'];
        $dept=$_POST['dept'];
        $class=$_POST['class'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $sql="UPDATE `picnic_ju` SET `NAME`='$name',`DEPT`='$dept',`CLASS`='$class',`EMAIL`='$email',`PHONE`='$phone',`DATE/TIME`=current_timestamp() WHERE `picnic_ju`.`ROLL`=$roll";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            echo "<script>alert('SUCCESSFULLY UPDATED...THANK YOU...')</script>";
        }
        else{
            echo "<script>alert('ACCESS DENIED')</script>";
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
        <style>
        body{
            height:1000px;
        }
        </style>
    </head>
<body>
    <div class="container">
<?php

    echo '
            <h1>WELCOME TO JADAVPUR UNIVERSITY</h1>
            <h3>THIS PICNIC IS SPONSORED BY JADAVPUR UNIVERSITY</h3>
            <p>***PLEASE UPDATE THE FORM CAREFULLY ***</p>
            <h3>ROLL NO.:- '.$roll.'<br>';
?>
            <form action="update.php" method="post" id="form" name="form" onsubmit="return validateForm()">
                <input id="name" name="Name" type="text" placeholder="FULL NAME (IN CAPITAL LETTERS )" required><b><lebel id="errorname"></lebel></b>
                <input id="dept" name="dept" type="text" placeholder="DEPERTMENT NAME (IN CAPITAL LETTERS )" required><b><lebel id="errordept"></lebel></b>
                <input id="class" name="class" type="text" placeholder="CURRENT CLASS (IN CAPITAL LETTERS )" required><b><lebel id="errorclass"></lebel></b>
                <input id="email" name="email" type="email" placeholder="EMAIL ID" required><b><lebel id="erroremail"><lebel></b>
                <input id="phone" name="phone" type="phone" placeholder="MOBILE NUMBER" required><b><lebel id="errorphone"></lebel></b>
                <input class="btn" type="submit" name="submit" value="UPDATE" style="padding-top:2px;">
            </form><br><br>
            <a href="index.php" class="btn">RETURN TO HOME PAGE</a>
            <a href="table.php" class="btn">LIST_OF_PEOPLE</a>
        </div>

</body>

<script src="index.js"></script>
</html>
