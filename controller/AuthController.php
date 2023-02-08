<?php
include "code/auth.php";
include "db.php";
class AuthController{

public function __construct(){
        $this->checkLoggedIn();
}   

public function admin(mysqli $conn){
        $user_id = $_SESSION['auth_user']['user_id'];
        $query = "SELECT id, role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1 ";
        $result = $conn->query($query);
        
        if($result->num_rows == 1){
            return true;
        }else{
            redirect("Nemate administratorska ovlascenja", "index.php");
        }
    }
private function checkLoggedIn()
    {
        if (!isset($_SESSION['auth'])) {
            redirect("Ulogujte se da bi videli ovu stranu", "login.php");
            return false;
        } else {
            return true;
        }
    }
   
}
$auth = new AuthController;