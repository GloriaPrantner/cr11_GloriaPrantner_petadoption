<?php
    ob_start();
    session_start();
    require_once 'actions/db_connect.php';

    if(isset($_SESSION['user'])){
        header("Location: home.php");
        exit;
    } elseif(isset($_SESSION['admin'])){
        header("Location: admin.php");
        exit;
    } elseif(!isset($_SESSION['superadmin'])){
        header("Location: index.php");
        exit;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <div class ="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="general.php">All Cuties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="senior.php">Seniors</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['admin']) || isset($_SESSION['superadmin']) ){
                            echo "
                            <li class='nav-item'>
                                <a class='nav-link' href='admin.php'>Admin<span class='sr-only'>(current)</span></a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='create.php'>Create</a>
                            </li>";
                        }
 
                        if (isset($_SESSION['superadmin'])){
                            echo "
                            <li class='nav-item active'>
                                <a class='nav-link' href='superadmin.php'>Users<span class='sr-only'>(current)</span></a>
                            </li>";
                        }
                    ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="actions/a_logout.php?logout">Log out</a>
                    </li>
                    
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <h3>Hello Superadmin</h3>
    
    <div class="row">
    <?php
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo  "
                <div class='card scheda col-4 mx-auto'>
                    <div class='card-body'>
                        <h5 class = 'card-title'>". $row['user_name']. "</h5>
                        <p class='card-text'>" . $row['user_email']. " <br>". $row['user_status']. " </p> 
                        <a href='delete.php?user_id=" . $row["user_id"] . "'> <button>Delete</button></a>
                    </div>
                </div>";
               }
           } else  {
               echo  "<center>No Data Avaliable</center>";
           }
    ?>

    </div>
   
    


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
<?php ob_end_flush(); ?>