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

// verification status
$stmt = $conn->prepare("SELECT verified FROM student_information WHERE user_id = ?;");
$stmt->bind_param("s", $user_id);
$stmt->bind_result($already_verified);
$stmt->execute();
$stmt->fetch();
$stmt->close();

// getting the image from the database
if ($form_completed && $exam_score > 0) {
    $stmt = $conn->prepare("SELECT img_profile FROM student_information WHERE user_id = ?;");
    $stmt->bind_param("s", $user_id);
    $stmt->bind_result($img_profile);
    $stmt->execute();
    $stmt->fetch();
    $stmt->close();
    $base64Img = base64_encode($img_profile);
}

$conn->close();
?>

<style>
    #video-container {
        overflow: hidden;
        position: relative;
        width: 300px;
        height: 300px;
    }

    video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

<div class="card text-primary bg-light p-3 mb-5">
    <div class="card-body">
        <h4 class="card-title">Verification</h4>

        <?php if ($already_verified) : ?>
            <p>You already verified your identity.</p>
        <?php elseif ($form_completed && $exam_score > 0) : ?>
            <div class="d-flex justify-content-center">
                <img src="data:<?= getMIMEType($img_profile); ?>;base64,<?= $base64Img ?>" hidden alt="profile image" id="dbImg">
                <div id="video-container">
                    <video id="video" playsinline autoplay muted></video>
                </div>
            </div>
            <p id="result_msg">Verifying identity...</p>
            <form method="post" action="actions/submit_verification_action.php" id="verification-form" hidden>
                <input type="checkbox" name="face-match" id="face-match">
            </form>
        <?php else : ?>
            <p>Please complete Steps 1 and 2 first before going to this step</p>
        <?php endif ?>
    </div>
</div>

<script src="face-api.js/dist/face-api.js" defer></script>
<script type="module" src="js/face_recognition.js" defer></script>