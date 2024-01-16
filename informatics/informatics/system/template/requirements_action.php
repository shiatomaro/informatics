<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $error = '';
    $success = '';
    if($_POST['action'] == "Update"){
        $userId = $_POST["hiddenId"];
        $sql = "SELECT * FROM student_requirements_tbl WHERE user_id='$userId'";
        $res = mysqli_query($object->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $uploadPath = "../img/requirements/";
            foreach($res as $row){
                if(isset($_FILES['form137'])){
                    if($_FILES['form137']['name'] != ""){
                        $form137_name = $_FILES['form137']['name'];
                        $form137_tmp = $_FILES['form137']['tmp_name'];
                        $fileNameForm137 = $userId."-Form-137".".png";
                        move_uploaded_file($form137_tmp, $uploadPath.$fileNameForm137);
                    }else{
                        $fileNameForm137 = $row['form_137'];
                    }
                }

                if(isset($_FILES['form138'])){
                    if($_FILES['form138']['name'] != ""){
                        $form138_name = $_FILES['form138']['name'];
                        $form138_tmp = $_FILES['form138']['tmp_name'];
                        $fileNameForm138 = $userId."-Form-138".".png";
                        move_uploaded_file($form138_tmp, $uploadPath.$fileNameForm138);
                    }else{
                        $fileNameForm138 = $row["form_138"];
                    }
                }
                if(isset($_FILES['birthCertificate'])){
                    if($_FILES['birthCertificate']['name'] != ""){
                        $birthCertificate_name = $_FILES['birthCertificate']['name'];
                        $birthCertificate_tmp = $_FILES['birthCertificate']['tmp_name'];
                        $fileNamebirthCertificate = $userId."-Birth-Certificate".".png";
                        move_uploaded_file($birthCertificate_tmp, $uploadPath.$fileNamebirthCertificate);
                    }else{
                        $fileNamebirthCertificate = $row["birth_certificate"];
                    }
                }
                if(isset($_FILES['barangayClearance'])){
                    if($_FILES['barangayClearance']['name'] != ""){
                        $barangayClearance_name = $_FILES['barangayClearance']['name'];
                        $barangayClearance_tmp = $_FILES['barangayClearance']['tmp_name'];
                        $fileNamebarangayClearance = $userId."-Barangay-Clearance".".png";
                        move_uploaded_file($barangayClearance_tmp, $uploadPath.$fileNamebarangayClearance);
                    }else{
                        $fileNamebarangayClearance = $row["barangay_clearance"];
                    }
                }
                if(isset($_FILES['goodMoralCertificate'])){
                    if($_FILES['goodMoralCertificate']['name'] != ""){
                        $goodMoralCertificate_name = $_FILES['goodMoralCertificate']['name'];
                        $goodMoralCertificate_tmp = $_FILES['goodMoralCertificate']['tmp_name'];
                        $fileNamegoodMoralCertificate = $userId."-Good-Moral-Certificate".".png";
                        move_uploaded_file($goodMoralCertificate_tmp, $uploadPath.$fileNamegoodMoralCertificate);
                    }else{
                        $fileNamegoodMoralCertificate = $row["good_moral_certificate"];
                    }
                }
    
                if(isset($_FILES['diploma'])){
                    if($_FILES['diploma']['name'] != ""){
                        $diploma_name = $_FILES['diploma']['name'];
                        $diploma_tmp = $_FILES['diploma']['tmp_name'];
                        $fileNamediploma = $userId."-Diploma".".png";
                        move_uploaded_file($diploma_tmp, $uploadPath.$fileNamediploma);
                    }else{
                        $fileNamediploma = $row["diploma"];
                    }
                }
            }
            $id_picture = addslashes($_POST['id_picture']);
            $query = "UPDATE student_requirements_tbl SET 
            form_137 = '$fileNameForm137',
            form_138 = '$fileNameForm138',
            birth_certificate = '$fileNamebirthCertificate',
            barangay_clearance = '$fileNamebarangayClearance',
            good_moral_certificate = '$fileNamegoodMoralCertificate',
            diploma = '$fileNamediploma',
            id_picture = '$id_picture'
            WHERE user_id='$userId'
            ";
            $result = mysqli_query($object->conn, $query);
            
            if($result){
                $success = "Updated Successfully!";
            }else{
                $error = '<div class="alert alert-danger"><b>Error:</b> There was something wrong!</div>';
            }
        }else{
            $error = '<div class="alert alert-danger"><b>Error:</b> There was an error!</div>';
        }
        $output = array(
            'success'       =>  $success,
            'error'         =>  $error
        );

        echo json_encode($output);
    }
    
    if($_POST['action'] == "getSingleData"){
        $userId = $_POST['userId'];
        $sql = "SELECT * FROM student_requirements_tbl WHERE user_id='$userId'";
        $res = mysqli_query($object->conn, $sql);
        $data = array();
        if(mysqli_num_rows($res) > 0){
            foreach($res as $row){
                if($row['form_137'] != ""){
                    $data['form_137'] = $row['form_137'];
                }else{
                    $data['form_137'] = 'no-image.png';
                }
                if($row['form_138'] != ""){
                    $data['form_138'] = $row['form_138'];
                }else{
                    $data['form_138'] = 'no-image.png';
                }
                if($row['birth_certificate'] != ""){
                    $data['birth_certificate'] = $row['birth_certificate'];
                }else{
                    $data['birth_certificate'] = 'no-image.png';
                }
                if($row['good_moral_certificate'] != ""){
                    $data['good_moral_certificate'] = $row['good_moral_certificate'];
                }else{
                    $data['good_moral_certificate'] = 'no-image.png';
                }
                if($row['barangay_clearance'] != ""){
                    $data['barangay_clearance'] = $row['barangay_clearance'];
                }else{
                    $data['barangay_clearance'] = 'no-image.png';
                }
                if($row['diploma'] != ""){
                    $data['diploma'] = $row['diploma'];
                }else{
                    $data['diploma'] = 'no-image.png';
                }
                $data['id_picture'] = $row['id_picture'];
            }
        }
        echo json_encode($data);
    }

    if($_POST['action'] == "Remove"){
        $forReq = $_POST['forReq'];
        $userId = $_POST['userId'];

        $selectUser = "SELECT * FROM student_requirements_tbl WHERE user_id='$userId'";
        $resultUser = mysqli_query($object->conn, $selectUser);
        if(mysqli_num_rows($resultUser) > 0){
            foreach($resultUser as $r){
                if($forReq == 'form137'){
                    if($r['form_137'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET form_137='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Form-137.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b> No file available to remove!</div>';
                    }
                }
                if($forReq == 'form138'){
                    if($r['form_138'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET form_138='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Form-138.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b> No file available to remove!</div>';
                    }
                }
                if($forReq == 'birthCertificate'){
                    if($r['birth_certificate'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET birth_certificate='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Birth-Certificate.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b> No file available to remove!</div>';
                    }
                }
                if($forReq == 'barangayClearance'){
                    if($r['barangay_clearance'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET barangay_clearance='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Good-Moral-Certificate.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b No file available to remove!</div>';
                    }
                }
                if($forReq == 'goodMoralCertificate'){
                    if($r['good_moral_certificate'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET good_moral_certificate='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Barangay-Clearance.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b> No file available to remove!</div>';
                    }
                }
                if($forReq == 'diploma'){
                    if($r['diploma'] != ""){
                        $sql = "UPDATE student_requirements_tbl SET diploma='' WHERE user_id='$userId'";
                        unlink('../img/requirements/'.$userId.'-Diploma.png');
                        $res = mysqli_query($object->conn, $sql);
                        $success = '<div class="alert alert-success"><b>Success:</b> Removed Successfully!</div>';
                    }else{
                        $error = '<div class="alert alert-danger"><b>Error:</b>No file available to remove!</div>';
                    }
                }
            }
        }else{
            $error = '<div class="alert alert-danger"><b>Error:</b>No user found! Please try again!</div>';
        }
        

        $output = array(
            'error' =>  $error,
            'success' => $success
        );

        echo json_encode($output);
    }
}
?>