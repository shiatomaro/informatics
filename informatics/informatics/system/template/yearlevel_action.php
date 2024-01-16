<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';
    $tblcourse = "yearlevel_tbl";

    // <start> For Course Action
    if($_POST['action'] == "courseAdd"){
        $yearLevel = addslashes($_POST['courseName']);
        $checkSql = "SELECT * FROM $tblcourse WHERE year_level='$yearLevel'";
        $insertSql = "INSERT INTO $tblcourse SET year_level='$yearLevel', status=1";
        $res = $object->insertData($checkSql, $insertSql);
        if($res){
            $success = '<div class="alert alert-success">Added Successfully!</div>';
        }else{
            $error = '<div class="alert alert-danger">Year Level already exist!</div>';
        }

        $output = array(
            'success'           =>  $success,
            'error'             =>  $error
        );
        
        echo json_encode($output);
    }

    if($_POST['action'] == "deleteCourse"){
        $id = $_POST['delete_id'];

        if($object->deleteData($tblcourse, $id)){
            $success = '<div class="alert alert-success">Deleted Successfully!</div>';
        }else{
            $error = '<div class="alert alert-danger">Unknown data, please try again!</div>';
        }

        $output = array(
            'success'           =>  $success,
            'error'             =>  $error
        );
        
        echo json_encode($output);
    }

    if($_POST['action'] == "getSingleData"){
        $dataId = $_POST['edit_id'];
        $res = $object->getSingleData($tblcourse, $dataId);
        $data = array();
        if($res){
            foreach($res as $row){
                $data['courseName'] = $row['year_level'];
            }
        }
        echo json_encode($data);
    }

    if($_POST['action'] == 'CourseEdit'){
        $success = '';
        $error = '';
        $prevCourseName = addslashes($_POST['previousCourseName']);
        $dataId = $_POST['hiddenid'];
        $courseName = $_POST['courseName'];
        $res = $object->getSingleData($tblcourse, $dataId);
        if($res){
            $q = "SELECT * FROM $tblcourse WHERE year_level='$courseName'";
            $m = mysqli_query($object->conn, $q);
            if($prevCourseName == $courseName){
                $update = "UPDATE $tblcourse SET year_level='$courseName' WHERE id='$dataId'";
                $upm = mysqli_query($object->conn, $update);
                $success = '<div class="alert alert-success">Update Successfully!</div>';
            }else{
                if(mysqli_num_rows($m) > 0){
                    $error = '<div class="alert alert-danger">Year Level already exist!</div>';
                }else{
                    $update = "UPDATE $tblcourse SET year_level='$courseName' WHERE id='$dataId'";
                    $upm = mysqli_query($object->conn, $update);
                    $success = '<div class="alert alert-success">Update Successfully!</div>';
                }
            }
        }else{
            $error = '<div class="alert alert-danger">Failed to update data! Please try again.</div>';
        }

        $output = array(
            'success'           =>  $success,
            'error'             =>  $error
        );
        
        echo json_encode($output);

    }

    if($_POST['action'] == "courseChange_Status"){
        $varId = $_POST['varId'];
        $varStatus = $_POST['varStatus'];
        $nextStatus = $_POST['nextStatus'];

        $res = $object->getSingleData($tblcourse, $varId);
        if($res){
            $update = "UPDATE $tblcourse SET status='$nextStatus' WHERE id='$varId'";
            $updateres = mysqli_query($object->conn, $update);
        }else{
            $error = '<div class="alert alert-danger">Failed to change status! Please try again!</div>';
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }
    // <end> For Course Action
}
?>