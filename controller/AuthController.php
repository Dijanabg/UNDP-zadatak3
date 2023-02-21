<?php
include "../code/auth.php";
include "../config/db.php";
class AuthController{

public function __construct(){
        $this->checkLoggedIn();
}   

public function admin(mysqli $conn){
        $userId = $_SESSION['auth_user']['id'];
        $query = "SELECT id, role_as FROM users WHERE id='$userId' AND role_as='1' LIMIT 1 ";
        $result = $conn->query($query);
        
        if($result->num_rows == 1){
            return true;
        }else{
            redirect("Nemate administratorska ovlascenja", "home.php");
        }
    }
public function adminBtn(mysqli $conn){
        $userId = $_SESSION['auth_user']['id'];
        $query = "SELECT id, role_as FROM users WHERE id='$userId' AND role_as='1' LIMIT 1 ";
        $result = $conn->query($query);
        
        if($result->num_rows == 1){
            return true;
        }else{
           return false;
        }
    }
private function checkLoggedIn()
    {
        if (!isset($_SESSION['auth'])) {
            redirect("Ulogujte se da bi videli ovu stranu", "../view/login.php");
            return false;
        } else {
            return true;
        }
    }
   
}
$auth = new AuthController;