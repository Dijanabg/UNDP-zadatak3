<?php
include "db.php";
class LoginController{

public function login($email, $password, mysqli $conn){
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $this->userAuth($data, $conn);
            return true;
        }else{
            return false;
        }
}

private function userAuth($data, mysqli $conn){
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = $data['role_as'];
        $_SESSION['auth_user'] = [
            'user_id'=>$data['id'],
            'ime'=>$data['ime'],
            'email'=>$data['email']
        ];

}
public function isLoggedin(){
    if (isset($_SESSION['auth'])===true) {
        redirect("Ulogovani ste", "index.php");
    } else {
        return false;
    }
}
}