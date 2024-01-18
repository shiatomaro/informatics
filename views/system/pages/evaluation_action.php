<?php
include('../../conn/conn.php');
$object = New forAction();

if(isset($_POST['action'])){
    $success = '';
    $error = '';
    if($_POST['action'] == "Update"){
        $userId = $_POST['userId'];
        $studentIndexNumber = addslashes($_POST['studentIndexNumber']);
        $approvedBy = addslashes($_POST['approvedBy']);
        $notedBy = addslashes($_POST['notedBy']);
        $status = addslashes($_POST['status']);
        $updatedAt = date('y-m-d H-i-s');
        $sql = "SELECT * FROM s_applicant_evaluation_tbl WHERE user_id='$userId'";
        $res = mysqli_query($object->conn, $sql);
        if(mysqli_num_rows($res) > 0){
            $updateQuery = "UPDATE s_applicant_evaluation_tbl SET
            approval_status='$status',
            student_index_number='$studentIndexNumber',
            approved_by='$approvedBy',
            noted_by='$notedBy',
            updated_at='$updatedAt'
            WHERE user_id='$userId'
            ";
            $updateRes = mysqli_query($object->conn, $updateQuery);
            if($updateRes){
                $success='Updated Successfully!';
            }else{
                $error = '<div class="alert alert-danger"><b>Error:</b> Failed to update. Please try again!</div>';
            }
        }else{
            $error = '<div class="alert alert-danger"><b>Error:</b> No user available. Please try again!</div>';
        }

        $output = array(
            'success'   =>  $success,
            'error'     =>  $error
        );

        echo json_encode($output);
    }

    if($_POST['action'] == "getSingleData"){
        $userId = $_POST['userId'];
        $sql = "SELECT * FROM s_applicant_evaluation_tbl WHERE user_id='$userId'";
        $sql2 = "SELECT * FROM student_administration_tbl WHERE position='Student Admin'";
        $sql3 = "SELECT * FROM student_administration_tbl WHERE position='Registrar'";
        $res = mysqli_query($object->conn, $sql);
        $res2 = mysqli_query($object->conn, $sql2);
        $res3 = mysqli_query($object->conn, $sql3);
        $data = array();
        foreach($res3 as $r3){
            if($r3['student_administration_name'] == ""){
                $RegName = "N/A";
            }else{
                $RegName = $r3['student_administration_name'];
            }
            $data['RegistrarName'] = $RegName;
        }
        foreach($res2 as $r2){
            if($r2['student_administration_name'] == ""){
                $AdminName = "N/A";
            }else{
                $AdminName = $r2['student_administration_name'];
            }
            $data['studentAdminName'] = $AdminName;
        }
        foreach($res as $r){
            if($r['approved_by'] == ""){
                $approvedBy = "N/A";
            }else{
                $approvedBy = $r['approved_by'];
            }

            if($r['noted_by'] == ""){
                $NotedBy = "N/A";
            }else{
                $NotedBy = $r['noted_by'];
            }
            $data['status'] = $r['approval_status'];
            $data['studentIndexNumber'] = $r['student_index_number'];
            $data['ApprovedByName'] = $approvedBy;
            $data['NotedByName'] = $NotedBy;
        }
        echo json_encode($data);
    }
}
?>