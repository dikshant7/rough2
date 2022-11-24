<?php
$server ="remotemysql.com";// remote database
$username="5vBcZXgHgu";
$password="HhGmU0OQpL";
$database="5vBcZXgHgu";
$conn=mysqli_connect($server,$username,$password,$database);
if($conn)
{
    echo " succefully connected";
}
else{
    die("error".mysqli_connect_error());
}
?>
