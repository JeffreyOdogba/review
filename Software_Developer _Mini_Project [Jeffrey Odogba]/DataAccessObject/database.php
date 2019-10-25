<?php 

class Database{
public $con;

    public function __construct(){

    $host="localhost";
    $user="root";
    $password="password";
    $dbname="restaurantDbContext";
    
    $this->con = mysqli_connect($host,$user,$password,$dbname) or die(mysqli_error($this->con));

    }
}
?>
