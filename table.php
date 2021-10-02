
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TABLE</title>
    <style>
    body{
        background-color:cyan;
        text-align:center;
    }
    table{
        border:2px solid black;
        margin:auto;
        margin-bottom:50px;
    }
    th{
        border:2px solid black;
        padding: 10px;
    }
     .btn{
        text-decoration:none;
        color:white;
        background-color:black;
        border:2px solid white;
        border-radius:10px;
        padding:5px;
    }
    .btn:hover{
        background-color: white;
        color:black;
        border:2px solid black;
    } 
    #form{
        text-align:center;
    }
    #search{
        border:2px solid black;
        border-radius:10px;
        width:600px;
        height:30px;
        text-align:center;
        margin-bottom:15px;
    }
    </style>
</head>
<body>
<h1>LIST OF PEOPLE WHO HAS FILLED UP THE FORM...</h1>
<form id="form" method="post" action="table.php">
    <input type="text" name="search" id="search" placeholder="SEARCH BY ROLL NO.">
    <input type="submit" name="submit" id="submit" class="btn" value="SEARCH">
</form>
<?php
    $server="localhost";
    $username="root";
    $password="";
    $db="aritra";
    
    $conn=mysqli_connect($server,$username,$password,$db);
    if(!$conn){
         die("CONNECTION FALIED".mysqli_connect_error());
    }

    $sql="SELECT * FROM `picnic_ju`";
    $result=mysqli_query($conn,$sql);
    $total=mysqli_num_rows($result);
    $count=1;
    echo "<table>";
    echo "<tr style='color:red'><th>SL</th><th>NAME</th><th>DEPT</th><th>CLASS</th><th>ROLL</th><th>EMAIL</th><th>PHONE</th><th>DATE/TIME</tr>";
    while($total>0)
    {
        $data=mysqli_fetch_assoc($result);
        $name=$data['NAME'];
        $dept=$data['DEPT'];
        $cls=$data['CLASS'];
        $roll=$data['ROLL'];
        $email=$data['EMAIL'];
        $phone=$data['PHONE'];
        $dt=$data['DATE/TIME'];
        if(isset($_POST['submit'])&&$_POST['search']==$roll){
            echo "<tr><th style='color:blue'>1</th><th>$name</th><th>$dept</th><th>$cls</th><th>$roll</th><th>$email</th><th>$phone</th><th>$dt</th></tr>";
        }
        else if(!isset($_POST['submit']))
        {
            echo "<tr><th style='color:blue'>$count</th><th>$name</th><th>$dept</th><th>$cls</th><th>$roll</th><th>$email</th><th>$phone</th><th>$dt</th></tr>";
        }
        $total-=1;
        $count+=1;
    }
    echo "</table>";
?>
<a href="index.php" class="btn">RETURN TO HOME PAGE</a>
</body>
</html>