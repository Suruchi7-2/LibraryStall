<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Book</h1>
            <div >
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

        
        
      <form action="process.php" method="post">

      <?php
        if(isset($_GET["id"]))
        {
            $id=$_GET["id"];
            include('connect.php');
            $sql="select * from books where id=$id";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($result);
        ?>
        
      <div class="form-elemnt my-4">
              <input type="text" class="form-control" name="title" value="<?php echo $row["title"];?>" placeholder="Book Title:">
          </div>
          <div class="form-elemnt my-4">
              <input type="text" class="form-control" name="author" value="<?php echo $row["author"];?>" placeholder="Author Name:">
          </div>
          <div class="form-element my-4">
              <!-- my adds margin to the top and bottom  -->
              <select name="type" class="form-element">
                  <option value="">Select Book Type</option>
                  <option value="Adventure" <?php if($row['type']=="Adventure"){echo "selected";} ?> >Adventure</option>
                  <option value="Sports" <?php if($row['type']=="Sports"){echo "selected";} ?>>Sports</option>
                  <option value="Scify" <?php if($row['type']=="Scify"){echo "selected";} ?>>Scify</option>
                  <option value="Horror" <?php if($row['type']=="Horror"){echo "selected";} ?>>Horror</option>
              </select>
          </div>
          <div class="form-element my-4">
              <!-- my adds margin to the top and bottom  -->
              <input type="text" name="description" value="<?php echo $row["description"];?>" class="form-control"  placeholder="Book Description">
          </div>
          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
          <div class="form-element">
              <input type="submit" class="btn btn-success" name="edit" value="Edit Book">
          </div>
          <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>

      </form>
    
        

       
    </div>
</body>
</html>