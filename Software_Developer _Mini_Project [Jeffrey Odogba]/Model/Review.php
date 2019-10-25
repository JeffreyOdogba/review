<?php


class Review{
    public $review;
    public $date_created;
    public $user_Id;
    public $restaurant_name;
    
    
    function set_review($r) {  
        $this->review =  $r;
      }

      function set_date_created($date_created) {  
        $this->date_created =  $date_created;
      }

      function set_userId($userid) {  
        $this->user_Id =  $userid;
      }

      function set_restaurant_name($restaurant_name) {  
        $this->restaurant_name =  $restaurant_name;
      }



      function get_review() {
        return $this->review;
      }

      function get_date_created() {
        return $this->date_created;
      }

      function get_userId() {
        return $this->user_Id;
      }

      function get_restaurant_name() {
        return $this->restaurant_name;
      }

}

?>