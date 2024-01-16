<?php
// Check if the form is submitted
include("../conn/conn.php");
$db = New DbConnection();

if(isset($_POST["action"])){
    if($_POST["action"] == 'login'){
        $error = '';
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        $sql = "SELECT * FROM user_tbl WHERE username='$username' AND password='$password'";
        $res = mysqli_query($db->conn, $sql);

        if(mysqli_num_rows($res) > 0){
            if(isset($_COOKIE["invalidLogin"])){
                if($_COOKIE["invalidLogin"] == 3){
                    $message = "Please wait 3mins to login again!";
                    $redirect = '';
                }else{
                    foreach($res as $value){
                        $userId = $value['user_id'];
                        $userType = $value['user_type'];
                        $userStatus = $value['status'];
                    }
                    if($userStatus == '1'){
                        if($userType == "Admin"){
                            setcookie("invalidLogin", '0');
                            $message = "You logged in as ".$userType."!";
                            $redirect = './dashboard';
                        }
                        if($userType == "Registrar"){
                            setcookie("invalidLogin", '0');
                            $message = "You logged in as ".$userType."!";
                            $redirect = './dashboard';
                        }
                        $_SESSION['userId'] = $userId;
                        $_SESSION['user_type'] = $userType;
                    }else{
                        $message = "Your account was disabled by the admin!";
                        $redirect = '';
                    }   
                }
            }else{
                foreach($res as $value){
                    $userId = $value['user_id'];
                    $userType = $value['user_type'];
                    $userStatus = $value['status'];
                }
                if($userStatus == '1'){
                    if($userType == "Admin"){
                        $message = "You logged in as ".$userType."!";
                        $redirect = './dashboard';
                    }
                    if($userType == "Registrar"){
                        $message = "You logged in as ".$userType."!";
                        $redirect = './dashboard';
                    }
                    $_SESSION['userId'] = $userId;
                    $_SESSION['user_type'] = $userType;
                }else{
                    $message = "Your account was disabled by the admin!";
                    $redirect = '';
                }
            }
        }else{
            $redirect = '';
            $countInvalidPass = '';
            if(isset($_COOKIE["invalidLogin"])){
                $cookieVal = $_COOKIE["invalidLogin"];
                if($_COOKIE["invalidLogin"] != 3){
                    $cookieVal += 1;
                    setcookie("invalidLogin", $cookieVal, time()+180);
                    $message = "Invalid username or password. Please try again!";
                }else{
                    $message = "Please wait 3mins to login again!";
                }
            }else{
                $message = "Invalid username or password. Please try again!";
                setcookie("invalidLogin", 1);
            }
        }

        $output = array(
            'message'           =>      $message,
            'redirect'          =>      $redirect
        );
        echo json_encode($output);
    }
}
?>