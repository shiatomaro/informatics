<?php
require_once 'actions/db.php';
require_once 'utils.php';
require_once 'controllers/credentials.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id'])) {
    header("Location: /system/student?page=1");
    exit();
}
// fetch data from the database
$conn = getConn();
$id = $conn->real_escape_string($queryParams['id']);

// Prepare SQL statement with placeholders
$sql = "
    SELECT si.id, si.fname, si.mname, si.lname, si.email, si.contact_num, si.address, si.citizenship, si.civil_status,
           si.med_cond, si.birthdate, si.sex, si.mother_fname, si.mother_mname, si.mother_lname, si.mother_contact,
           si.mother_occupation, si.father_fname, si.father_mname, si.father_lname, si.father_contact, si.father_occupation,
           si.guardian_fname, si.guardian_mname, si.guardian_lname, si.guardian_contact, si.year_level,
           fc.name AS first_choice_course, sc.name AS second_choice_course, si.prev_school
    FROM student_information si
    LEFT JOIN courses fc ON si.first_choice_course_id = fc.id
    LEFT JOIN courses sc ON si.second_choice_course_id = sc.id
    WHERE si.id = ?
";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind the parameter
$stmt->bind_param("i", $id);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Fetch the associative array
$studInfo = $result->fetch_assoc();

// Close the statement
$stmt->close();

$conn->close();

// Check if $studInfo is not empty before accessing its keys
if (!empty($studInfo)) {
    // Use isset() to check if the keys exist before accessing them
    $id = isset($studInfo['id']) ? $studInfo['id'] : '';
    $fname = isset($studInfo['fname']) ? $studInfo['fname'] : '';
    $mname = isset($studInfo['mname']) ? $studInfo['mname'] : '';
    $lname = isset($studInfo['lname']) ? $studInfo['lname'] : '';
    $email = isset($studInfo['email']) ? $studInfo['email'] : '';
    $contact_num = isset($studInfo['contact_num']) ? $studInfo['contact_num'] : '';
    $address = isset($studInfo['address']) ? $studInfo['address'] : '';
    $citizenship = isset($studInfo['citizenship']) ? $studInfo['citizenship'] : '';
    $civil_status = isset($studInfo['civil_status']) ? $studInfo['civil_status'] : '';
    $med_cond = isset($studInfo['med_cond']) ? $studInfo['med_cond'] : '';
    $birthdate = isset($studInfo['birthdate']) ? $studInfo['birthdate'] : '';
    $sex = isset($studInfo['sex']) ? $studInfo['sex'] : '';
    
    // Mother's Information
    $mother_fname = isset($studInfo['mother_fname']) ? $studInfo['mother_fname'] : '';
    $mother_mname = isset($studInfo['mother_mname']) ? $studInfo['mother_mname'] : '';
    $mother_lname = isset($studInfo['mother_lname']) ? $studInfo['mother_lname'] : '';
    $mother_contact = isset($studInfo['mother_contact']) ? $studInfo['mother_contact'] : '';
    $mother_occupation = isset($studInfo['mother_occupation']) ? $studInfo['mother_occupation'] : '';
    
    // Father's Information
    $father_fname = isset($studInfo['father_fname']) ? $studInfo['father_fname'] : '';
    $father_mname = isset($studInfo['father_mname']) ? $studInfo['father_mname'] : '';
    $father_lname = isset($studInfo['father_lname']) ? $studInfo['father_lname'] : '';
    $father_contact = isset($studInfo['father_contact']) ? $studInfo['father_contact'] : '';
    $father_occupation = isset($studInfo['father_occupation']) ? $studInfo['father_occupation'] : '';
    
    // Guardian's Information
    $guardian_fname = isset($studInfo['guardian_fname']) ? $studInfo['guardian_fname'] : '';
    $guardian_mname = isset($studInfo['guardian_mname']) ? $studInfo['guardian_mname'] : '';
    $guardian_lname = isset($studInfo['guardian_lname']) ? $studInfo['guardian_lname'] : '';
    $guardian_contact = isset($studInfo['guardian_contact']) ? $studInfo['guardian_contact'] : '';
    
    // Educational Information
    $year_level = isset($studInfo['year_level']) ? $studInfo['year_level'] : '';
    $first_choice_course_id = isset($studInfo['first_choice_course']) ? $studInfo['first_choice_course'] : '';
    $second_choice_course_id = isset($studInfo['second_choice_course']) ? $studInfo['second_choice_course'] : '';

    $prev_school = isset($studInfo['prev_school']) ? $studInfo['prev_school'] : '';
}
?>
    <div class="row">
    <div class="col">
        <h1>Student Info</h1>
    </div>
    <div class="col-auto">
        <a class="btn btn-secondary" href="/system/students" role="button">Back</a>
    </div>
    </div>


    <section>
    <h2>Student Information</h2>
    <ul class="list-group">
    <li class="list-group-item"><b>ID</b>: <?= $studInfo['id']; ?></li>
        <li class="list-group-item"><b>First Name</b>: <?= isset($studInfo['fname']) ? $studInfo['fname'] : '' ?></li>
        <li class="list-group-item"><b>Middle Name</b>: <?= isset($studInfo['mname']) ? $studInfo['mname'] : '' ?></li>
        <li class="list-group-item"><b>Last Name</b>: <?= isset($studInfo['lname']) ? $studInfo['lname'] : '' ?></li>
        <li class="list-group-item"><b>Email Address</b>: <?= isset($studInfo['email']) ? $studInfo['email'] : '' ?></li>
        <li class="list-group-item"><b>Contact Number</b>: <?= isset($studInfo['contact_num']) ? $studInfo['contact_num'] : '' ?></li>
        <li class="list-group-item"><b>Present Address</b>: <?= isset($studInfo['address']) ? $studInfo['address'] : '' ?></li>
        <li class="list-group-item"><b>Citizenship</b>: <?= isset($studInfo['citizenship']) ? $studInfo['citizenship'] : '' ?></li>
        <li class="list-group-item"><b>Civil Status</b>: <?= isset($studInfo['civil_status']) ? $studInfo['civil_status'] : '' ?></li>

        <?php if (isset($studInfo['occupation'])): ?>
            <li class="list-group-item"><b>Occupation</b>: <?= $studInfo['occupation'] ?></li>
        <?php endif; ?>
        <li class="list-group-item"><b>Medical Conditions</b>: <?= isset($studInfo['med_cond']) ? $studInfo['med_cond'] : '' ?></li>
        <li class="list-group-item"><b>Date of Birth</b>: <?= isset($studInfo['birthdate']) ? $studInfo['birthdate'] : '' ?></li>
        <li class="list-group-item"><b>Sex Assigned at Birth</b>: <?= isset($studInfo['sex']) ? $studInfo['sex'] : '' ?></li>
        <li class="list-group-item"><h3>Mother's Information</h3></li>
        <li class="list-group-item"><b>First Name</b>: <?= isset($studInfo['mother_fname']) ? $studInfo['mother_fname'] : '' ?></li>
        <li class="list-group-item"><b>Middle Name</b>: <?= isset($studInfo['mother_mname']) ? $studInfo['mother_mname'] : '' ?></li>
        <li class="list-group-item"><b>Last Name</b>: <?= $studInfo['mother_lname'] ?></li>
        <li class="list-group-item"><b>Contact Number</b>: <?= $studInfo['mother_contact'] ?></li>
        <li class="list-group-item"><b>Occupation</b>: <?= $studInfo['mother_occupation'] ?></li>
        <li class="list-group-item"><h3>Father's Information</h3></li>
        <li class="list-group-item"><b>First Name</b>: <?= $studInfo['father_fname'] ?></li>
        <li class="list-group-item"><b>Middle Name</b>: <?= $studInfo['father_mname'] ?></li>
        <li class="list-group-item"><b>Last Name</b>: <?= $studInfo['father_lname'] ?></li>
        <li class="list-group-item"><b>Contact Number</b>: <?= $studInfo['father_contact'] ?></li>
        <li class="list-group-item"><b>Occupation</b>: <?= $studInfo['father_occupation'] ?></li>
        <li class="list-group-item"><h3>Guardian's Information</h3></li>
        <li class="list-group-item"><b>First Name</b>: <?= $studInfo['guardian_fname'] ?></li>
        <li class="list-group-item"><b>Middle Name</b>: <?= $studInfo['guardian_mname'] ?></li>
        <li class="list-group-item"><b>Last Name</b>: <?= $studInfo['guardian_lname'] ?></li>
        <li class="list-group-item"><b>Contact Number</b>: <?= $studInfo['guardian_contact'] ?></li>
        <li class="list-group-item"><h3>Educational Information</h3></li>
        <li class="list-group-item"><b>Grade/Year Level Applying For</b>: <?= $studInfo['year_level'] ?></li>
        <li class="list-group-item"><b>First Choice Course/Strand</b>: <?= $studInfo['first_choice_course'] ?></li>
        <li class="list-group-item"><b>Second Choice Course/Strand</b>: <?= $studInfo['second_choice_course'] ?></li>
        <li class="list-group-item"><b>Previous School</b>: <?= $studInfo['prev_school'] ?></li>
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
<script>
function printContent() {
    var content = document.getElementById("printable-content").innerHTML;
    var originalBody = document.body.innerHTML;
    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = originalBody; // Restore original content
}
</script>

<!-- Print button -->
<button class="btn btn-primary mt-3" onclick="printContent()">Print</button>