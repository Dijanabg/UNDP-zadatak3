<?php
include "../config/db.php";
class LoginController{

public function login($email, $password, mysqli $conn){
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $result = $conn->query($query);
        if($result->num_rows > 0){
           
            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($result);
           
            $userId = $userdata['id'];
            $ime = $userdata['ime'];
            $email = $userdata['email'];
            $role_as = $userdata['role_as'];
    
            $_SESSION['auth_user'] = [
                'id' => $userId,
                'ime' => $ime,
                'email' => $email
    
            ];
    
            $_SESSION['role_as'] = $role_as;
    
            if ($role_as == 1) {
                redirect("Welcome to dashboard", "../admin/admin.php");
                
            } else {
                redirect("Logged in successfuly", "home.php");
            }
        } else {
            redirect("Invalid Credentials", "login.php");
}
}
}