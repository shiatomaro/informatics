<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';
    $tblcourse = "course_tbl";

    // <start> For Course Action
    if($_POST['action'] == "courseAdd"){
        $courseName = addslashes($_POST['courseName']);
        $courseDesc = addslashes($_POST['courseDesc']);
        if($object->CourseInsertData($tblcourse, $courseName, $courseDesc)){
            $success = '<div class="alert alert-success">Added Successfully!</div>';
        }else{
            $error = '<div class="alert alert-danger">Course name already exist!</div>';
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
                $data['courseDesc'] = $row['course_desc'];
            }
        }
        echo json_encode($data);
    }

    if($_POST['action'] == 'CourseEdit'){
        $success = '';
        $error = '';
        $prevCourseName = addslashes($_POST['previousCourseName']);
        $prevCourseDesc = addslashes($_POST['previousCourseDesc']);
        $dataId = $_POST['hiddenid'];
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        $res = $object->getSingleData($tblcourse, $dataId);
        if($res){
            $q = "SELECT * FROM $tblcourse WHERE course_name='$courseName' AND course_desc='$courseDesc'";
            $m = mysqli_query($object->conn, $q);
            if($prevCourseName == $courseName && $prevCourseDesc == $courseDesc){
                $update = "UPDATE $tblcourse SET course_name='$courseName', course_desc='$courseDesc' WHERE id='$dataId'";
                $upm = mysqli_query($object->conn, $update);
                $success = '<div class="alert alert-success">Update Successfully!</div>';
            }else{
                if(mysqli_num_rows($m) > 0){
                    $error = '<div class="alert alert-danger">Course name already exist!</div>';
                }else{
                    $update = "UPDATE $tblcourse SET course_name='$courseName', course_desc='$courseDesc' WHERE id='$dataId'";
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