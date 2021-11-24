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
        Interview list
    </title>
    <style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;

font-size: 25px;
text-align: left;
}
th {
    font-family: monospace;
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
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
        </tr>
        <?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "interview";
$conn = mysqli_connect($hostname, $username, $password,$dbname) ;
if (!$conn){ die('Could not connect: '. mysqli_connect_error());}
error_reporting(0);
$query="Select * from example order by Date";
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
    <META HTTP-EQUIV="Refresh" CONTENT="5; URL=http://localhost/interviewbit/Interviewlist.php">
 
</body>
</html>