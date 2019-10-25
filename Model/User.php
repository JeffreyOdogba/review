<?php
class User{
    public $user_id;
    public $username;
    public $email;
    public $password;

    function set_name($un) {  
        $this->username =  $un;
      }

      function set_email($email) { 
        $this->email = preg_replace('/\s+/', '', $email);
      }

      function set_password($password) {  
        $this->password = preg_replace('/\s+/', '', $password);
      }

      function get_name() {
        return $this->username;
      }

      function get_email() {
        return $this->email;
      }

      function get_password() {
        return $this->password;
      }
    
}
?>