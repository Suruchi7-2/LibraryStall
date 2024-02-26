<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="crud";
$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    die('Something Went Wrong');

}
?>