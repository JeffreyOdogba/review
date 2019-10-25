<?php
include('./actions/getAllRestaurantAddedByUserService.php');
//include('./actions/addNewRestaurantService.php');
//include('./actions/logout.php');
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

        <form action="actions/addNewRestaurantService.php" method="Post">
            <div class="form-group">
                <input type="text" class="form-control col-sm-5" id="restaurantName" name="restaurantName" placeholder="Enter Restaurant Name">
            </div>
            <button type="submit" name="addNewRestaurant" class="btn btn-primary">add new Restaurant</button>
        </form>

        <?php
        $Restrow = $obj->getAllRestaurantAddedByUser();
        foreach ($Restrow as $row) {
            ?>
            <p> <?php echo $row["restaurant_name"]; ?> </p>

        <?php
        }
        ?>


<form action="actions/addReviewService.php" method="Post">
            <div class="form-group">
            <input type="text" class="form-control col-sm-5" id="restaurantName" name="restaurantname" placeholder="Restaurant Name">
                <input type="text" class="form-control col-sm-5" id="restaurantName" name="review" placeholder="Review...">
            </div>
            <button type="submit" name="postReview" class="btn btn-primary">add new Restaurant</button>
        </form>
    </br>
        <b class="btn"> <a href="logout.php">Log Out</a></b>
    </div>
</body>

</html>