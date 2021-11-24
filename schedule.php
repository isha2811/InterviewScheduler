<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <title>Interview Scheduler</title>
    <style>
        table{
            color:black;
            border-radius: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            
        }
        table tr td{
            color:black;
            font-size:20px;
            font-family: 'Lato', sans-serif;
        }
        input{
            padding:10px;
            border:#000;
            border-radius:5px;
            
        }
        #button{
            background-color: aqua ;
            color:black;
            font-style:bold;
            height:50px;
            width: 90px;
            border-radius: 25px;
        }
        body{
            background-image:url("bg.jpg");
        }
        #navi{
            display:inline-block;
            font-family: 'Lato', sans-serif;
            
        }
        #lbutton{
            background-color: aqua ;
            color:black;
            height:40px;
            width: 120px;
            border-radius: 25px;
            padding:7px;
            float:left;
            display:inline-block;
        }
    </style>
</head>
<body>
    <?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "interview";
$conn = mysqli_connect($hostname, $username, $password,$dbname) ;
if (!$conn){ die('Could not connect: '. mysqli_connect_error());}


?>
<div id="navi">
    <h1>
        Schedule Your Interview
    </h1>
    </div>
   <div id="navi"> <form method="POST" action="Interviewlist.php">
    <input type="submit" value=" Interview List" id="lbutton"/>
  </form></div>
  <div id="navi">
  <form method="POST" action="editilist.php">
    <input type="submit" value="Edit Interview" id="lbutton"/>
  </form>
    <form name="interview" method="post" action="#" onsubmit="return validateform()">
    </div>
        <table  border="0" align="center" cellspacing="30">
            <tr>
                <td>Participant Name</td><td><input type="text" placeholder="Full Name" name="Pname" id="Pname"required></td>
            </tr>
            <tr>
                <td>Interviewer Name</td><td><input type="text" placeholder="Full Name" name="Iname" id="Iname" required></td>
            </tr> 
            <tr>
                <td>Date of Interview</td><td><input type="date" placeholder="Date" name="date" id="date" required></td>
            </tr> 
            <tr>
                <td>Start Time</td><td><input type="time" placeholder="Start Time" name="Stime"  id="Stime"required></td>
            </tr> 
            <tr>
                <td>End Time</td><td><input type="time" placeholder="End Time" name="Etime" id="Etime" required></td>
            </tr> 
            
            <tr>
            <td colspan="2" align="center";><input type="submit" id="button" name="Submit" ></td>
            </tr>
        </table>
    </form>
    <?php
if(isset($_POST['Submit'])){
	$pname=$_POST['Pname'];
    $iname=$_POST['Iname'];
    $date=$_POST['date'];
    $stime=$_POST['Stime'];
    $etime=$_POST['Etime'];
    $x=0;
	$sql="select * from example where participant='$pname';";
	$res=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($res))
	{
	    $newdate=$row["Date"];
       if($date==$newdate)
        {
           if(($stime > $row["Start_time"] && $stime < $row["end_time"]) || ($etime > $row["Start_time"] && $etime<$row["end_time"]) || 
            ($stime > $row["Start_time"] && $etime <$row["end_time"]) || ($stime==$row["Start_time"] || $etime<$row["end_time"]) ||
           ($stime < $row["Start_time"] && $etime > $row["end_time"]))
            {  $x=1;
               echo"<script>alert('Overlapping !!select a new schedule')</script>";
               break;
           }
                        
        }
    }
  if($x==0)
  {
    $sqlll="insert into example values('$pname','$iname','$date','$stime','$etime')";
  
    if(mysqli_query($conn,$sqlll))
    {
        echo"<script>alert('new record inserted')</script>";
    }
    else{
        echo"error".mysqli_error($conn);
    }}
    }
?>
<script>
    function validateform()
    {
        var pa=document.forms["interview"]["Pname"].value;
        var i=document.forms["interview"]["Iname"].value;
        if(pa.value== "" || i.value=="")
        {
            alert("NO of participants is less than 2");
            return false;
        }
    }
    </script>
</body>
</html>