<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';
    $tblstudent_admin = "student_administration_tbl";

    // <start> For Student Administration
    if($_POST['action'] == "studentAdminAdd"){
        $courseName = addslashes($_POST['courseName']);
        $position = addslashes($_POST['position']);
        $selectSql = "SELECT * FROM $tblstudent_admin WHERE student_administration_name LIKE '$courseName'";
        $insertSql = "INSERT INTO $tblstudent_admin SET student_administration_name='$courseName', position='$position', status=true";
        $res = $object->insertData($selectSql, $insertSql);
        if($res){
            $success = '<div class="alert alert-success">Added Successfully!</div>';
        }else{
            $error = '<div class="alert alert-danger">Student Admin/Registrar name already exist!</div>';
        }

        $output = array(
            'success'           =>  $success,
            'error'             =>  $error
        );
        
        echo json_encode($output);
    }

    if($_POST['action'] == "deleteCourse"){
        $id = $_POST['delete_id'];

        if($object->deleteData($tblstudent_admin, $id)){
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
        $res = $object->getSingleData($tblstudent_admin, $dataId);
        $data = array();
        if($res){
            foreach($res as $row){
                $data['courseName'] = $row['student_administration_name'];
                $data['position'] = $row['position'];
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
        $res = $object->getSingleData($tblstudent_admin, $dataId);
        if($res){
            $q = "SELECT * FROM $tblstudent_admin WHERE student_administration_name='$courseName'";
            $m = mysqli_query($object->conn, $q);
            if($prevCourseName == $courseName){
                $update = "UPDATE $tblstudent_admin SET student_administration_name='$courseName' WHERE id='$dataId'";
                $upm = mysqli_query($object->conn, $update);
                $success = '<div class="alert alert-success">Update Successfully!</div>';
            }else{
                if(mysqli_num_rows($m) > 0){
                    foreach($m as $r){
                        $pos = $r['student_administration_name'];
                    }
                    $error = '<div class="alert alert-danger">'.$pos.' name already exist!</div>';
                }else{
                    $update = "UPDATE $tblstudent_admin SET student_administration_name='$courseName' WHERE id='$dataId'";
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

        $res = $object->getSingleData($tblstudent_admin, $varId);
        if($res){
            $update = "UPDATE $tblstudent_admin SET status='$nextStatus' WHERE id='$varId'";
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
    // <end> For Student Administration
}
?>