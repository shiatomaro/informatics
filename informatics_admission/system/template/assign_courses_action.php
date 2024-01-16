<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';
    $tblcourse = "assign_course_tbl";

    // <start> For Course Action
    if($_POST['action'] == "courseAdd"){
        $courseName = addslashes($_POST['courseName']);
        $yearLevel = addslashes($_POST['year_level']);
        $checkSql = "SELECT * FROM $tblcourse WHERE course_name='$courseName' AND year_level='$yearLevel'";
        $checkRes = mysqli_query($object->conn, $checkSql);
        if(mysqli_num_rows($checkRes) > 0){
            $error = '<div class="alert alert-danger"><b>Error: </b>Sorry, course name already assigned!</div>';
        }else{
            $insertSql = "INSERT INTO $tblcourse SET
            course_name='$courseName',
            year_level='$yearLevel',
            status=1";
            $insertRes = mysqli_query($object->conn, $insertSql);
            if($insertRes){
                $success = '<div class="alert alert-success">Added Successfully!</div>';
            }else{
                $error = '<div class="alert alert-danger"><b>Error: </b>There was something wrong! Please contact the admin!</b>';
            }
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
                $data['courseName'] = $row['course_name'];
                $data['year_level'] = $row['year_level'];
            }
        }
        echo json_encode($data);
    }

    if($_POST['action'] == 'CourseEdit'){
        $success = '';
        $error = '';
        $prevCourseName = addslashes($_POST['previousCourseName']);
        $dataId = $_POST['hiddenid'];
        $courseName = addslashes($_POST['courseName']);
        $year_level = addslashes($_POST['year_level']);
        $prevYearLevel = addslashes($_POST['previousYearLevel']);
        $res = $object->getSingleData($tblcourse, $dataId);
        if($res){
            $q = "SELECT * FROM $tblcourse WHERE course_name='$courseName' AND year_level='$year_level'";
            $m = mysqli_query($object->conn, $q);
            if($prevCourseName == $courseName && $prevYearLevel == $year_level){
                $update = "UPDATE $tblcourse SET course_name='$courseName', year_level='$year_level' WHERE id='$dataId'";
                $upm = mysqli_query($object->conn, $update);
                $success = '<div class="alert alert-success">Update Successfully!</div>';
            }else{
                if(mysqli_num_rows($m) > 0){
                    $error = '<div class="alert alert-danger"><b>Error: </b>Course already assigned! Please try again!</div>';
                }else{
                    $update = "UPDATE $tblcourse SET year_level='$courseName', year_level='$year_level' WHERE id='$dataId'";
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