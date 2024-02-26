
    <!-- // use of mysqli_real_escape_string to santise the user input before moving it into sql query and process it. 
    // $title=mysqli_real_escape_string($conn, $_POST["title"]);
    // $author=mysqli_real_escape_string($conn, $_POST["author"]);
    
    // $description=mysqli_real_escape_string($conn,$_POST["description"]);
    //  it above things help from sql injection attack as attacker may add something harmful code into database for stolen putpose
     -->
     <?php
include('connect.php');
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $sqlInsert = "INSERT INTO books(title , author , type , description) VALUES ('$title','$author','$type', '$description')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location:index.php");
       

    }else{
        die("Something went wrong");
    }
}

//for edit books update query will be 
if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sql="update books set title='$title', author='$author', type='$type', description='$description' where id='$id'";

    if(mysqli_query($conn,$sql)){
        session_start();
        $_SESSION["update"] = "Book updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>