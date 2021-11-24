<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
    <title>
         Edit Interview 
    </title>
    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: 'Lato', sans-serif;

font-size: 25px;
text-align: left;
}
th {
    font-family: monospace;
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
#ebutton{
    background-color:Yellow;
    font-size:18px;
    height:40px;
    color:black;
}
#dbutton{
    background-color:Green;
    font-size:18px;
    height:40px;
    color:black;
}
body{font-family: 'Lato', sans-serif;
            background-image:url("bg.jpg");
        }
</style>
</head>
<body>
    <h1>List OF Interviews Scheduled</h1>
    <table border="2">
        <tr>
             <th>Participant Name</th>
             <th>Interviewer</th>
             <th>Date of Interview</th>
             <th>Start time</th>
             <th>End time</th>
             <th colspan='2'>Edit/Delete</th>
        </tr>
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "interview";
$conn = mysqli_connect($hostname, $username, $password,$dbname) ;
if (!$conn){ die('Could not connect: '. mysqli_connect_error());}
error_reporting(0);
$query="Select * from example ";
$data= mysqli_query($conn,$query);
$count=mysqli_num_rows($data);
if($count!=0)
{
    while($result = mysqli_fetch_assoc($data))
    {
        echo"
        <tr>
            <td>".$result['participant']."</td>
            <td>".$result['interviewer']."</td>
             <td>".$result['Date']."</td>
             <td>".$result['Start_time']."</td>
             <td>".$result['end_time']."</td>
             <td><a href='update.php?pa=$result[participant]&in=$result[interviewer]&da=$result[Date]&st=$result[Start_time]&et=$result[end_time]'><input type='submit' value='Edit' id='ebutton'></a></td>
             <td><a href='delete.php?st=$result[Start_time]&et=$result[end_time]' onclick='return valideletion()'><input type='submit' value='Delete' id='dbutton'></a></td>
             </tr>";
    }
}
else{
    echo"
    <tr>
        <td colspan='6'>No Interview Scheduled</td>
    </tr>";

}
?>
    </table>
    <script>
        function valideletion()
        {
            return Confirm("Please Confirm if you want to delete this record!!");
        }
        </script>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=http://localhost/interviewbit/editilist.php">
</body>
</html> 