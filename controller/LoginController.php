<?php
include "../db.php";
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
        //ovde bi trebalo staviti role 
        $_SESSION['auth_user'] = [
            'user_id'=>$data['id'],
            'ime'=>$data['ime'],
            'email'=>$data['email']
        ];

}
}