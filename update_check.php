<?php
if(isset($_POST['roll'])){

    $server="localhost";
    $username="root";
    $password="";
    $db="aritra";

    $conn=mysqli_connect($server,$username,$password,$db);
    if(!$conn){
        die("CONNECTION FALIED".mysqli_connect_error());
    }


    $roll=$_POST['roll'];

    $query="SELECT * FROM `picnic_ju`";
    $data=mysqli_query($conn,$query);
    $total=mysqli_num_rows($data);
    $flag=false;

    while($total>0){
        $R=mysqli_fetch_assoc($data);
        //echo "<h2 style='color:yellow'>".$R['ROLL']."</h2>";
        if(strcmp($R['ROLL'],$roll)==0)
        {
        
            $flag=true;
            /*echo "<h1 style='color:RED'>Record Match Found!!!...<br>You Have Already Filled Up The Form...<br>THANK YOU!!!....</h1>";
            echo "<a href='index.php' style='border:2px solid red;border-radius:10px;padding:5px;text-decoration:none;color:red'>CLICK TO RETURN</a>";

            die("");*/
        }
        $total-=1;
    }
    if($flag)
    {
        session_start();
        $_SESSION['roll']=$roll;
        header('Location:update.php');
    }
    else{
        echo "<script>alert('ROLL NOT FOUND....PLEASE ENTER ROLL NUMBER CORRECTLY..')</script>";
        // echo "<h1>ROLL NOT FOUND....PLEASE ENTER ROLL NUMBER CORRECTLY..</h1>";
        // echo "<a href='index.php' style='border:2px solid green;border-radius:10px;padding:5px;text-decoration:none;color:green'>CLICK TO RETURN</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PICNIC_JU</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body{
        height:1000px;
    }
    </style>
</head>
<body>
    <div class="container">
    <h1>... ENTER YOUR ROLL NUMBER ...</h1> 
    <form action="update_check.php" method="post" id="form" name="form">
            <input id="roll" name="roll" type="text" placeholder="CLASS ROLL NUMBER" required><b><lebel id="errorroll"></lebel></b>
            <input class="btn" type="submit" name="submit" value="SUBMIT" style="padding-top:2px;">
        </form><br><br>
        <a href="index.php" class="btn">RETURN TO HOME PAGE</a>
        <a href="table.php" class="btn">LIST_OF_PEOPLE</a>
    </div>
</body>

</html>