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
$conn->close();
$img_profile = base64_encode($studInfo['img_profile']);
$img_payment = base64_encode($studInfo['img_payment']);
$img_birthcert = base64_encode($studInfo['img_birthcert']);
$img_form137 = base64_encode($studInfo['img_form137']);
$img_form138 = base64_encode($studInfo['img_form138']);
$img_goodmoral = base64_encode($studInfo['img_goodmoral']);
$img_brgyclear = base64_encode($studInfo['img_brgyclear']);
$img_transfercert = base64_encode($studInfo['img_transfercert']);
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
        <div class="accordion" id="requirementsAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-profile">
                        Profile Photo
                    </button>
                </h2>
                <div id="collapse-profile" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_profile ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-payment">
                        Payment
                    </button>
                </h2>
                <div id="collapse-payment" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_payment ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-birthcert">
                        Birth Certificate
                    </button>
                </h2>
                <div id="collapse-birthcert" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_birthcert ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-form137">
                        Form 137
                    </button>
                </h2>
                <div id="collapse-form137" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_form137 ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-form138">
                        Form 138
                    </button>
                </h2>
                <div id="collapse-form138" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_form138 ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-goodmoral">
                        Good Moral
                    </button>
                </h2>
                <div id="collapse-goodmoral" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_goodmoral ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-brgyclear">
                        Baranggay Clearance
                    </button>
                </h2>
                <div id="collapse-brgyclear" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_brgyclear ?>">
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-transfercert">
                        Transfer Certificate
                    </button>
                </h2>
                <div id="collapse-transfercert" class="accordion-collapse collapse" data-bs-parent="#requirementsAccordion">
                    <div class="accordion-body">
                        <img src="data:image/jpeg;base64,<?= $img_transfercert ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>