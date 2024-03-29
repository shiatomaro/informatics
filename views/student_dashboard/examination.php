<?php
require_once 'actions/db.php';
require_once 'utils.php';

// Fetch data from the database
$conn = getConn();
$user_id = $conn->real_escape_string($_SESSION['user_id']);
$grade_level = ''; // Initialize grade level variable

// Get user's grade level
$stmt = $conn->prepare("SELECT year_level FROM student_information WHERE user_id = ?;");
$stmt->bind_param("s", $user_id);
$stmt->bind_result($grade_level);
$stmt->execute();
$stmt->fetch();
$stmt->close();

// Check if the user is in grade 11 or grade 12
if ($grade_level === "G11" || $grade_level === "G12") {
    // Directly proceed to verification
    header("Location: /dashboard/verification");
    exit();
}

// If user is not in grade 11 or grade 12, proceed with examination
$exam_result = null; // Initialize exam result variable

$sql = "SELECT score FROM assessments WHERE user_id = {$user_id}";
$exam_result = $conn->query($sql)->fetch_assoc();
$conn->close();
?>

<div class="mt-3">
    <?php if ($exam_result === null) : ?>
        <div class="h-100 w-100">
            <h1>Examination</h1>
            <b class="text-dark">Warning:</b><em class="text-dark">you will have to take the test from the start if you leave this page without finishing the exam.</em>
            <div class="quiz-container w-100 h-100" id="quiz">
                <form action="actions/submit_exam_action.php" method="post" id="quiz_form">
                    <input type="range" name="score" hidden id="form_score">
                </form>
                <div class="quiz-header">
                    <p id="question"> Question </p>
                </div>
                <ul class="item">
                    <li>
                        <input type="radio" name="answer" id="a" class="answer">
                        <label for="a" id="a_text"> Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="b" class="answer">
                        <label for="b" id="b_text"> Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="c" class="answer">
                        <label for="c" id="c_text"> Answer</label>
                    </li>
                    <li>
                        <input type="radio" name="answer" id="d" class="answer">
                        <label for="d" id="d_text"> Answer</label>
                    </li>
                </ul>
                <button id="submit">Submit</button>
            </div>
        </div>
    <?php else : ?>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">You already took this exam</h4>
                <p class="card-text">Your score: <b><?= $exam_result['score']; ?></b></p>
            </div>
        </div>
    <?php endif ?>
</div>
