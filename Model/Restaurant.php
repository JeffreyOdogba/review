<?php 
class Restaurant{
    public $restaurantName;
    public $user_id;

    function set_restaurantName($rn) {  
        $this->restaurantName =  $rn;
      }

      function set_userId($userid) {  
        $this->user_id =  $userid;
      }

      function get_restaurantName() {
        return $this->restaurantName;
      }

      function get_userId() {
        return $this->user_id;
      }

}
?>