<?php 
include('../../conn/conn.php');
$db = New DbConnection(); 
$sql = "SELECT COUNT(s_applicant_evaluation_tbl.approval_status) as student , s_applicant_evaluation_tbl.approval_status as status from s_applicant_evaluation_tbl INNER JOIN p_information_tbl ON s_applicant_evaluation_tbl.user_id=p_information_tbl.user_id GROUP BY s_applicant_evaluation_tbl.approval_status ORDER BY s_applicant_evaluation_tbl.approval_status ASC";
$result = mysqli_query($db->conn, $sql);

$monthlyApproval = array();

while ($row = mysqli_fetch_assoc($result)) {
    $amount = $row["student"];
    
    $status = $row["status"];
    // Monthly sales
    if (!isset($monthlyApproval[$status])) {
        $monthlyApproval[$status] = 0;
    }
    $monthlyApproval[$status] += $amount;
 }

$allstatus = array_keys($monthlyApproval);
$allamount = array_values($monthlyApproval);

$response = array(
    'labels' => $allstatus,
    'data' => $allamount
);

echo json_encode($response);

?>