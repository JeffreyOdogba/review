<?php
include ('./DataAccessObject/Service.php');
// if (!isset($_SESSION["user_email"])) {
//     header("location: index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>

<body>
    <div class="container">
        <h1> Welcome </h1>

        <form action="DataAccessObject/Service.php" method="Post">
            <div class="form-group">
                <input type="text" class="form-control" id="restaurantName" name="restaurantName" placeholder="Enter Restaurant Name">
            </div>
            <button type="submit" name="addNewRestaurant" class="btn btn-primary">Click to add new Restaurant</button>
        </form>


        <?php
        $Restrow = $obj->getAllRestaurantAddedByUser();
        foreach ($Restrow as $row) {
            ?>
            <p> <?php echo $row["restaurant_name"]; ?> </p>

        <?php
        }
        ?>
        <b class="btn"> <a href="logout.php">Log Out</a></b>
    </div>
</body>

</html>