<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['user_id'])) {
    header("Location: /system/student?page=1");
    exit();
}

// fetch data from the database
$conn = getConn();
$user_id = $conn->real_escape_string($queryParams['user_id']);
$sql = "
    SELECT si.*, fc.name AS first_choice, sc.name AS second_choice, a.score AS exam_score
    FROM student_information si
    LEFT JOIN courses fc ON si.first_choice_course_id = fc.id
    LEFT JOIN courses sc ON si.second_choice_course_id = sc.id
    LEFT JOIN assessments a ON si.user_id = a.user_id
    WHERE si.user_id = $user_id
    ";
$result = $conn->query($sql);
$studInfo = $result->fetch_assoc();
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Student Info</h1>
        </div>
        <div class="col-auto">
            <a class="btn btn-secondary" href="/system/students" role="button">Back</a>
        </div>
    </div>

    <section>
        <ul class="list-group">
            <li class="list-group-item"><b>User ID</b>: <?= $studInfo['user_id'] ?></li>
            <li class="list-group-item"><b>Name</b>: <?= "{$studInfo['fname']} {$studInfo['mname']} {$studInfo['lname']}" ?></li>
            <li class="list-group-item"><b>First Choice</b>: <?= $studInfo['first_choice'] ?></li>
            <li class="list-group-item"><b>Second Choice</b>: <?= $studInfo['second_choice'] ?></li>
            <li class="list-group-item"><b>Year Level</b>: <?= $studInfo['year_level'] ?></li>
            <li class="list-group-item"><b>Exam Score</b>: <?= $studInfo['exam_score'] ?></li>
        </ul>
    </section>

    <section class="mt-3">
        <h2>Requirements</h2>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Form137
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Form138
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Student Evaluation
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>