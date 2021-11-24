<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "interview";
$conn = mysqli_connect($hostname, $username, $password,$dbname) ;
if (!$conn){ 
    die('Could not connect: '. mysqli_connect_error());
    }
error_reporting(0);
$st=$_GET['st'];
$et=$_GET['et'];
$query="DELETE FROM EXAMPLE WHERE Start_time='$st' and end_time='$et'";
$data=mysqli_query($conn,$query);
if($data)
{
    echo"<script>alert('Record Deleted from list')</script>";

}else{
    echo"<script>alert('FAILED to delete!!')</script>";
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="5; URL=http://localhost/interviewbit/editilist.php">
