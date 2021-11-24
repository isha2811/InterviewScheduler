<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "interview";
$conn = mysqli_connect($hostname, $username, $password,$dbname) ;
if (!$conn){ die('Could not connect: '. mysqli_connect_error());}
error_reporting(0);
$pa= $_GET['pa'];
$in=$_GET['in'];
$da=$_GET['da'];
$st=$_GET['st'];
$et=$_GET['et'];

?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <title>Updating Interview</title>
    <style>
        table{
            color:black;
            border-radius: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            
        }
        table tr td{
            color:black;
            font-family: 'Lato', sans-serif;
        }
        #button{
            background-color: aqua ;
            color:black;
            height:40px;
            width: 80px;
            border-radius: 25px;
        }
        body{
            font-family: 'Lato', sans-serif;
            background-image:url("bg.jpg");
        }
    </style>
</head>
<body>
    <h1>Updating Records</h1>
  
    <form method="GET" action="#">
        <table  border="0" align="center" cellspacing="30">
            <tr>
                <td>Participant Name</td><td><input type="text" value="<?php echo"$pa"?>" name="Pname" id="Pname"required></td>
            </tr>
            <tr>
                <td>Interviewer Name</td><td><input type="text" value="<?php echo"$in"?>" name="Iname" id="Iname" required></td>
            </tr> 
            <tr>
                <td>Date of Interview</td><td><input type="date" value="<?php echo"$da"?>" name="date" id="date" required></td>
            </tr> 
            <tr>
                <td>Start Time</td><td><input type="time" value="<?php echo"$st"?>" name="Stime"  id="Stime"required></td>
            </tr> 
            <tr>
                <td>End Time</td><td><input type="time" value="<?php echo"$et"?>" name="Etime" id="Etime" required></td>
            </tr> 
            
            <tr>
            <td colspan="2" align="center"><input type="submit" id="button" name="Submit" value="Update" ></td>
            </tr>
        </table>
    </form>
    </body>
    </html>
    <?php

    if($_GET['Submit'])
    {
      $part =$_GET['Pname'];
      $inte =$_GET['Iname'];
      $date=$_GET['date'];
      $stime=$_GET['Stime'];
      $etime=$_GET['Etime'];
      $query="UPDATE example SET participant='$part',interviewer='$inte',Date='$date', Start_time='$stime',end_time='$etime' WHERE participant='$pa'and Date='$da' and Start_time='$st'and end_time='$et'";

      $data =mysqli_query($conn,$query);
      if($data)
    {
        echo"<script>alert(' Record Updation SUCCESSFUL!!')</script>";
    }
    else{
        echo"error".mysqli_error($conn);
    }
    }
    ?>
    
   