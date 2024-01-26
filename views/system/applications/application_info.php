<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['user_id'])) {
    header("Location: /system/applications?page=1");
    exit();
}

// fetch data from the database
$conn = getConn();
$stmt = $conn->prepare("
    SELECT sa.id, sa.status, sa.approved_by, sa.noted_by, sa.created_at, sa.updated_at, si.fname, si.mname, si.lname, a.score, fc.name AS first_choice, sc.name AS second_choice, si.year_level, si.img_profile, si.img_payment, si.img_birthcert, img_form137, img_form138, img_goodmoral, img_brgyclear, img_transfercert
    FROM student_applications sa
    LEFT JOIN student_information si ON sa.user_id = si.user_id
    LEFT JOIN assessments a ON sa.user_id = a.user_id
    LEFT JOIN courses fc ON si.first_choice_course_id = fc.id
    LEFT JOIN courses sc ON si.second_choice_course_id = sc.id
    WHERE sa.user_id = ?
");
$user_id = $conn->real_escape_string($queryParams['user_id']);
$stmt->bind_param("s", $user_id);
$stmt->bind_result($app_id, $app_status, $approved_by, $noted_by, $created_at, $updated_at, $fname, $mname, $lname, $score, $first_choice, $second_choice, $year_level, $img_profile, $img_payment, $img_birthcert, $img_form137, $img_form138, $img_goodmoral, $img_brgyclear, $img_transfercert);
$stmt->execute();
$stmt->fetch();
$stmt->close();
$conn->close();

// encode images
$img_profile = base64_encode($img_profile);
$img_payment = base64_encode($img_payment);
$img_birthcert = base64_encode($img_birthcert);
$img_form137 = base64_encode($img_form137);
$img_form138 = base64_encode($img_form138);
$img_goodmoral = base64_encode($img_goodmoral);
$img_brgyclear = base64_encode($img_brgyclear);
$img_transfercert = base64_encode($img_transfercert);
?>

<div class="container pt-3">

    <section class="mt-3">
        <h1>Manage Application</h1>
        <form method="post" action="actions/update_application_action.php">
            <input type="text" value=<?= $user_id ?> name="user-id" hidden>
            <div class="input-group mb-3">
                <span class="input-group-text">Application Status</span>
                <select class="form-control" name="status" aria-label="User Type">
                    <option value="approved" <?= $app_status == "approved" ? "selected" : "" ?>>Approved</option>
                    <option value="rejected" <?= $app_status == "rejected" ? "selected" : "" ?>>Rejected</option>
                    <option value="processing" <?= $app_status == "processing" ? "selected" : "" ?>>Processing</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Approved By</span>
                <input type="text" class="form-control" aria-label="Approved by" value="<?= $approved_by ?>" name="approved-by">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Noted By</span>
                <input type="text" class="form-control" aria-label="Noted by" value="<?= $approved_by ?>" name="noted-by">
            </div>

            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="/system/applications?page=1" role="button">Back</a>
                <button type="submit" class="btn btn-primary ms-2">Save</button>
            </div>
        </form>
    </section>

    <section>
        <h1>Application Info</h1>
        <ul class="list-group">
            <li class="list-group-item"><b>Application ID</b>: <?= $app_id ?></li>
            <li class="list-group-item"><b>Applicant's Name</b>: <?= "$fname $mname $lname" ?></li>
            <li class="list-group-item"><b>First Choice</b>: <?= $first_choice ?></li>
            <li class="list-group-item"><b>Second Choice</b>: <?= $second_choice ?></li>
            <li class="list-group-item"><b>Year Level</b>: <?= $year_level ?></li>
            <li class="list-group-item"><b>Exam Score</b>: <?= $score ?></li>
            <li class="list-group-item"><b>Created at</b>: <?= $created_at ?></li>
            <li class="list-group-item"><b>Last updated at</b>: <?= $updated_at ?></li>
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