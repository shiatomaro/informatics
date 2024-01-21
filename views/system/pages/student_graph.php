<?php 
include('../../conn/conn.php'); 
$sql = "SELECT COUNT(s_applicant_evaluation.approval_status) AS sales, s_applicant_evaluation.updated_at FROM s_applicant_evaluation eval INNER JOIN p_information_tbl info ON eval.user_id=info.user_id WHERE eval.approval_status='Accepted' GROUP BY MONTH(eval.user_id) ORDER BY eval.user_id ASC";
$result = $conn->query($sql);

$monthStudentsAccepted = array();

while ($row = $result->fetch_assoc()) {
    $amount = $row["sales"];
    $date = strtotime($row["orderdate"]);

    $monthYear = date("M", $date);
    
    if (!isset($monthStudentsAccepted[$monthYear])) {
        $monthStudentsAccepted[$monthYear] = 0;
    }
    $monthStudentsAccepted[$monthYear] += $amount;
 }

$monthlyLabels = array_keys($monthStudentsAccepted);
$monthlyData = array_values($monthStudentsAccepted);

$response = array(
    'labels' => $monthlyLabels,
    'data' => $monthlyData
);

echo json_encode($response);

?>