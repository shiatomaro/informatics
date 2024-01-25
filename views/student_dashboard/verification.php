<?php
require_once "controllers/credentials.php";
require_once "actions/db.php";
require_once "utils.php";
requireCredentials();

$conn = getConn();
$user_id = $conn->real_escape_string($_SESSION["user_id"]);

// getting the admission form's status
$stmt = $conn->prepare("SELECT completed FROM student_information WHERE user_id = ?;");
$stmt->bind_param("s", $user_id);
$stmt->bind_result($form_completed);
$stmt->execute();
$stmt->fetch();
$stmt->close();

// getting the exam's status
$stmt = $conn->prepare("SELECT score FROM assessments WHERE user_id = ?;");
$stmt->bind_param("s", $user_id);
$stmt->bind_result($exam_score);
$stmt->execute();
$stmt->fetch();
$stmt->close();

// application status
$stmt = $conn->prepare("SELECT status FROM student_applications WHERE user_id = ?;");
$stmt->bind_param("s", $user_id);
$stmt->bind_result($app_status);
$stmt->execute();
$stmt->fetch();
$stmt->close();
$app_status = $app_status === null ? "processing" : $app_status;

$conn->close();
?>




<div class="card text-primary bg-light p-3 mb-5">
    <div class="card-body">
        <h4 class="card-title">Verification</h4>

        <?php if ($form_completed && $exam_score > 0) : ?>
            <p>Verification</p>
        <?php else : ?>
            <p>Please complete Steps 1 and 2 first before going to this step</p>
        <?php endif ?>
    </div>
</div>