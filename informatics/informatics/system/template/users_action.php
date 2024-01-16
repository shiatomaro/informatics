<?php
require_once '../../conn/conn.php';
$act = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';


    if($_POST['action'] == "getSingleData"){
        $userId = $_POST['userId'];
        $sql = "SELECT * FROM user_tbl WHERE user_id='$userId'";
        $res = mysqli_query($act->conn, $sql);
        $data = array();
        if(mysqli_num_rows($res) > 0){
            foreach($res as $row){
                $data['userId'] = $row['user_id'];
                $data['username'] = $row['username'];
                $data['emailAddress'] = $row['email_address'];
                $data['password'] = $row['password'];
                $data['userType'] = $row['user_type'];
            }
        }
        echo json_encode($data);
    }

    if($_POST['action'] == "Add"){
        $username = addslashes($_POST['username']);
        $emailAddress = addslashes($_POST['email_address']);
        $password = addslashes($_POST['password']);
        $userType = addslashes($_POST['user_type']);
        $user_id = mt_rand(10000000,99999999);

        $sql = "SELECT * FROM user_tbl WHERE email_address='$emailAddress'";
        $res = mysqli_query($act->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $error = '<div class="alert alert-danger"><b>Error:</b> This email already exist. Please try again!</div>';
        }else{
            $update = "INSERT INTO user_tbl SET
            user_id='$user_id',
            username='$username',
            email_address='$emailAddress',
            password='$password',
            user_type='$userType',
            status=1
            ";
            $resup = mysqli_query($act->conn, $update);
            $success = 'Added Successfully!';
            
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }

    if($_POST['action'] == "Edit"){
        $userId = $_POST['hiddenid'];
        $previousEmail = addslashes($_POST['previousEmail']);
        $email = addslashes($_POST['email_address']);
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
        $user_type = $_POST['user_type'];

        $sql = "SELECT * FROM user_tbl WHERE email_address='$email'";
        $res = mysqli_query($act->conn, $sql);
        if($email == $previousEmail){
            $upd = "UPDATE user_tbl SET username='$username', email_address='$previousEmail', password='$password', user_type='$user_type' WHERE user_id='$userId'";
            $resUpd = mysqli_query($act->conn, $upd);
            $success = 'Updated Successfully!';
        }else{
            if(mysqli_num_rows($res) > 0){
                $error = '<div class="alert alert-danger"><b>Error:</b> This email already exist. Please try again!</div>';
            }else{
                $upd = "UPDATE user_tbl SET username='$username', email_address='$email', password='$password', user_type='$user_type' WHERE user_id='$userId'";
                $resUpd = mysqli_query($act->conn, $upd);
                $success = 'Updated Successfully!';
            }
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }

    if($_POST['action'] == "changeStatus"){
        $userId = $_POST['varId'];
        $nextStatus = $_POST['nextStatus'];

        $sql = "SELECT * FROM user_tbl WHERE user_id='$userId'";
        $res = mysqli_query($act->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $updateSql = "UPDATE user_tbl SET status='$nextStatus' WHERE user_id='$userId'";
            $updateRes = mysqli_query($act->conn, $updateSql);
            $success = 'Changed Status Successfully!';
        }else{
            $error = '<div class="alert alert-danger"><b>Error:</b> Can not update because no data available. Please try again!</div>';
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }

    if($_POST['action'] == "deleteUser"){
        $userId = $_POST['delete_id'];

        $sql = "SELECT * FROM user_tbl WHERE user_id='$userId'";
        $res = mysqli_query($act->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $updateSql = "DELETE FROM user_tbl WHERE user_id='$userId'";
            $updateRes = mysqli_query($act->conn, $updateSql);
            $success = 'Deleted Successfully!';
        }else{
            $error = '<div class="alert alert-danger"><b>Error:</b> Can not delete because no data available. Please try again!</div>';
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }
}
?>