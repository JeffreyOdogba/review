<?php

session_start();

include ('database.php');
include ('/Users/nationgreat/Desktop/Projects/Software_Developer _Mini_Project [Jeffrey Odogba]/Model/User.php');
include ('/Users/nationgreat/Desktop/Projects/Software_Developer _Mini_Project [Jeffrey Odogba]/Model/Restaurant.php');
include ('/Users/nationgreat/Desktop/Projects/Software_Developer _Mini_Project [Jeffrey Odogba]/Model/Review.php');




class Service extends Database
{
    public function InsertNewUser()
    {
        $user = new User();
        if (isset($_POST["signup"])) {
            $user->set_name($_POST['username']);
            $user->set_email($_POST['email']);
            $user->set_password($_POST['password']);

            $username = $user->get_name();
            $email = $user->get_email();
            $password = $user->get_password();

            if ($username == null || $email == null || $password == null) {
                echo "Cannot be null";
            } else {
                $sql = "INSERT INTO users(username,email,password) VALUES ('$username','$email', '$password')";

                $query =  mysqli_query($this->con, $sql);
                header("Location: http://localhost:8080/welcome.php");
            }
        }
    }

    public function SignInUser()
    {
        $user = new User();

        if (isset($_POST["signin"])) {

            //Set User
            $user->set_email($_POST['email']);
            $user->set_password($_POST['password']);

            //Get User
            $email = $user->get_email();
            $password = $user->get_password();

            //Db Query;
            $sql = "SELECT * FROM USERS WHERE email = '$email' and password = '$password' ";
            $result = mysqli_query($this->con, $sql);

            //get record of signed user
            $testFatch = $result->fetch_array();
            $userid =  $testFatch['user_Id'];

            //returned count of result
            $rows = mysqli_num_rows($result);

            if ($rows == 1) {

                //Store Signed in User information in SESSION
                $_SESSION["user_email"] = $email;
                $_SESSION["user_id"] = $userid;
               
                header("Location: http://localhost:8080/welcome.php");
            } else {
                echo "Invaild Information";
            }
        }
    }

    public function AddNewRestaurant()
    {
        $restaurant = new Restaurant();
        if (isset($_POST["addNewRestaurant"])) {
            $restaurant->set_restaurantName($_POST['restaurantName']);
            $restaurant->set_userId($_SESSION['user_id']);

            $restaurantName = $restaurant->get_restaurantName();
            $userid = $restaurant->get_userId();

           
            if ($restaurantName == null || $userid == null) {
                echo "Cannot be null";
            } else {
                $sql = "INSERT INTO restaurants(restaurant_name, user_id) VALUES ('$restaurantName','$userid')";

                $query =  mysqli_query($this->con, $sql);
                header("Location: http://localhost:8080/welcome.php");
            }
        }
    }

    public function getAllRestaurantAddedByUser()
    {
        $session_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM restaurants where user_id = '$session_id' ";
        $array = array();
        $query = mysqli_query($this->con, $sql);

        while ($row =  mysqli_fetch_assoc($query)) {
           $array[] = $row;
        }
        return $array;
    }

    // public function AddReview()
    // {
    //     $ListOfRest = getAllRestaurantAddedByUser();
    //     $review = new Review();
    //     $date = new DateTime();
    //     if (isset($_POST["postReview"])) {
    //         $review->set_review($_POST['review']);
    //         $review->set_date_created($date->format('Y-m-d H:i'));
    //         $review->set_userId($_SESSION['user_id']);
    //         $review->set_restaurant_Id($ListOfRest["restaurant_id"]);

    //         $review_detail =   $review->get_review();
    //         $date_created = $review->get_date_created();
    //         $userid = $review->get_userId();
    //         $restaurantid = $review->get_restaurant_Id();

    //         $sql = "INSERT INTO reviews(review_details,date_created,user_id,restaurant_id)  VALUES($review_detail,$date_created,$userid,(Select restaurant_id from restaurants where restaurant_id ='$restaurantid')) ";
    //     }
    // }

}

$obj = new Service;

$obj->InsertNewUser();
$obj->SignInUser();
$obj->AddNewRestaurant();
$obj->getAllRestaurantAddedByUser();


