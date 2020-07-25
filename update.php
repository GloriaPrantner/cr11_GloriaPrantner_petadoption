<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<?php 
if($_GET['animal_id']){
    $id =  $_GET['animal_id'];  

    $sql = "SELECT *,location.location_city, location.location_zip, location.location_address FROM animal INNER JOIN location ON animal.location_id = location.location_id WHERE animal_id = $id";

    $result = mysqli_query($conn, $sql);
    $row= $result->fetch_assoc();

}


?>


<h3>Update</h3>
        <form action="actions/a_update.php" method="get">
            <input type="hidden" name="animal_id" value="<?php echo $row['animal_id'] ?>">
            Name: <input type="text" name="animal_name" value="<?php echo $row['animal_name'] ?>" maxlength="25" required><span class="validity"><br>
            Image(URL): <input type="url" name="animal_img" value="<?php echo $row['animal_img'] ?>" maxlength="500"><span class="validity"></span><br>
            Description: <input type="text" name="animal_description" value="<?php echo $row['animal_description'] ?>"maxlength="500" required><span class="validity"></span><br>
            Address: <input type="text" name="location_address" value="<?php echo $row['location_address'] ?>"maxlength="150" required><span class="validity"></span><br>
            City: <input type="text" name="location_city" value="<?php echo $row['location_city'] ?>"maxlength="50" required><span class="validity"></span><br>
            ZIP: <input type="number" name="location_zip" value="<?php echo $row['location_zip'] ?>"maxlength="11" required><span class="validity"></span><br>

            Type: <br>
                <input type="radio" name="animal_type" value="small">
                <label for="small">Small</label><br>
                <input type="radio" name="animal_type" value="large">
                <label for="large">Large</label><br>
            <input type="submit" name="submit" value="submit">
        </form>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>