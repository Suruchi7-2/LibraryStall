<?php
if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    include('connect.php');
    $sql="delete from books where id='$id'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Book record deleted successfully";
    }
    else{
        die('Something went wrong');
    }
}
?>