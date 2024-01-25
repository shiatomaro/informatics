<?php
require_once './db.php';
require_once '../controllers/credentials.php';
require_once '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireCredentials();
    $conn = getConn();

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare(
        "INSERT INTO student_information 
        (user_id, completed, fname, mname, lname, email, contact_num, address, citizenship, civil_status, rs_status, occupation, med_cond, birthdate, sex, mother_fname, mother_mname, mother_lname, mother_contact, mother_occupation, father_fname, father_mname, father_lname, father_contact, father_occupation, guardian_fname, guardian_mname, guardian_lname, guardian_contact, year_level, first_choice_course_id, second_choice_course_id, prev_school, img_profile, img_profile_filename, img_payment, img_payment_filename, img_birthcert, img_birthcert_filename, img_form137, img_form137_filename, img_form138, img_form138_filename, img_goodmoral, img_goodmoral_filename, img_brgyclear, img_brgyclear_filename, img_transfercert, img_transfercert_filename) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        "
    );
    $stmt->bind_param("issssssssssssssssssssssssssssssssssssssssssssssss", $user_id, $completed, $name_first, $name_middle, $name_last, $email, $contact_num, $address, $citizenship, $civil_status, $rs_status, $occupation, $med_condition, $birthdate, $sex, $mother_fname, $mother_mname, $mother_lname, $mother_contact, $mother_occupation, $father_fname, $father_mname, $father_lname, $father_contact, $father_occupation, $guardian_fname, $guardian_mname, $guardian_lname, $guardian_contact, $year_level, $first_choice, $second_choice, $prev_school, $img_profile, $img_profile_filename, $img_payment, $img_payment_filename, $img_birthcert, $img_birthcert_filename, $img_form137, $img_form137_filename, $img_form138, $img_form138_filename, $img_goodmoral, $img_goodmoral_filename, $img_brgyclear, $img_brgyclear_filename, $img_transfercert, $img_transfercert_filename);

    @session_start();
    $user_id = $_SESSION['user_id'];

    // fetch the data from the form
    $name_first = $_POST['name-first'] !== '' ? $conn->real_escape_string($_POST['name-first']) : null;
    $name_middle = $_POST['name-middle'] !== '' ? $conn->real_escape_string($_POST['name-middle']) : null;
    $name_last = $_POST['name-last'] !== '' ? $conn->real_escape_string($_POST['name-last']) : null;
    $email = $_POST['email'] !== '' ? $conn->real_escape_string($_POST['email']) : null;
    $contact_num = $_POST['contact-num'] !== '' ? $conn->real_escape_string($_POST['contact-num']) : null;
    $address = $_POST['address'] !== '' ? $conn->real_escape_string($_POST['address']) : null;
    $citizenship = $_POST['citizenship'] !== '' ? $conn->real_escape_string($_POST['citizenship']) : null;
    $civil_status = $_POST['civil-status'] !== '' ? $conn->real_escape_string($_POST['civil-status']) : null;
    $rs_status = $_POST['rs-status'] !== '' ? $conn->real_escape_string($_POST['rs-status']) : null;
    $occupation = $_POST['occupation'] !== '' ? $conn->real_escape_string($_POST['occupation']) : null;
    $med_condition = $_POST['med-condition'] !== '' ? $conn->real_escape_string($_POST['med-condition']) : null;
    $birthdate = $_POST['birthdate'] !== '' ? $conn->real_escape_string($_POST['birthdate']) : null;
    $sex = $_POST['sex'] !== '' ? $conn->real_escape_string($_POST['sex']) : null;

    $mother_fname = $_POST['mother-name-first'] !== '' ? $conn->real_escape_string($_POST['mother-name-first']) : null;
    $mother_mname = $_POST['mother-name-middle'] !== '' ? $conn->real_escape_string($_POST['mother-name-middle']) : null;
    $mother_lname = $_POST['mother-name-last'] !== '' ? $conn->real_escape_string($_POST['mother-name-last']) : null;
    $mother_contact = $_POST['mother-contact'] !== '' ? $conn->real_escape_string($_POST['mother-contact']) : null;
    $mother_occupation = $_POST['mother-occupation'] !== '' ? $conn->real_escape_string($_POST['mother-occupation']) : null;

    $father_fname = $_POST['father-name-first'] !== '' ? $conn->real_escape_string($_POST['father-name-first']) : null;
    $father_mname = $_POST['father-name-middle'] !== '' ? $conn->real_escape_string($_POST['father-name-middle']) : null;
    $father_lname = $_POST['father-name-last'] !== '' ? $conn->real_escape_string($_POST['father-name-last']) : null;
    $father_contact = $_POST['father-contact'] !== '' ? $conn->real_escape_string($_POST['father-contact']) : null;
    $father_occupation = $_POST['father-occupation'] !== '' ? $conn->real_escape_string($_POST['father-occupation']) : null;

    $guardian_fname = $_POST['guardian-name-first'] !== '' ? $conn->real_escape_string($_POST['guardian-name-first']) : null;
    $guardian_mname = $_POST['guardian-name-middle'] !== '' ? $conn->real_escape_string($_POST['guardian-name-middle']) : null;
    $guardian_lname = $_POST['guardian-name-last'] !== '' ? $conn->real_escape_string($_POST['guardian-name-last']) : null;
    $guardian_contact = $_POST['guardian-contact'] !== '' ? $conn->real_escape_string($_POST['guardian-contact']) : null;

    $year_level = $_POST['grade-level'] !== '' ? $conn->real_escape_string($_POST['grade-level']) : null;
    $first_choice = $_POST['choice-1'] !== '' ? $conn->real_escape_string($_POST['choice-1']) : null;
    $second_choice = $_POST['choice-2'] !== '' ? $conn->real_escape_string($_POST['choice-2']) : null;
    $prev_school_dropdown = $_POST['prev-school-dropdown'] !== '' ? $conn->real_escape_string($_POST['prev-school-dropdown']) : null;
    $prev_school_input = $_POST['prev-school-input'] !== '' ? $conn->real_escape_string($_POST['prev-school-input']) : null;
    $prev_school = $prev_school_input !== null ? $prev_school_input : $prev_school_dropdown;

    // fetch the images from the form
    $img_profile = $_FILES["img-profile"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-profile"]["tmp_name"]) : null;
    $img_payment = $_FILES["img-payment"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-payment"]["tmp_name"]) : null;
    $img_birthcert = $_FILES["img-birthcert"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-birthcert"]["tmp_name"]) : null;
    $img_form137 = $_FILES["img-form137"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-form137"]["tmp_name"]) : null;
    $img_form138 = $_FILES["img-form138"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-form138"]["tmp_name"]) : null;
    $img_goodmoral = $_FILES["img-goodmoral"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-goodmoral"]["tmp_name"]) : null;
    $img_brgyclear = $_FILES["img-brgyclearance"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-brgyclearance"]["tmp_name"]) : null;
    $img_transfercert = $_FILES["img-transfercert"]["tmp_name"] !== "" ? file_get_contents($_FILES["img-transfercert"]["tmp_name"]) : null;
    // get the filenames and set it to null if it's an empty string
    $img_profile_filename = $conn->real_escape_string($_FILES["img-profile"]["name"]);
    $img_profile_filename = $img_profile_filename === "" ? $_POST["img-profile-filename"] : $img_profile_filename;
    $img_payment_filename = $conn->real_escape_string($_FILES["img-payment"]["name"]);
    $img_payment_filename = $img_payment_filename === "" ? $_POST["img-payment-filename"] : $img_payment_filename;
    $img_birthcert_filename = $conn->real_escape_string($_FILES["img-birthcert"]["name"]);
    $img_birthcert_filename = $img_birthcert_filename === "" ? $_POST["img-birthcert-filename"] : $img_birthcert_filename;
    $img_form137_filename = $conn->real_escape_string($_FILES["img-form137"]["name"]);
    $img_form137_filename = $img_form137_filename === "" ? $_POST["img-form137-filename"] : $img_form137_filename;
    $img_form138_filename = $conn->real_escape_string($_FILES["img-form138"]["name"]);
    $img_form138_filename = $img_form138_filename === "" ? $_POST["img-form138-filename"] : $img_form138_filename;
    $img_goodmoral_filename = $conn->real_escape_string($_FILES["img-goodmoral"]["name"]);
    $img_goodmoral_filename = $img_goodmoral_filename === "" ? $_POST["img-goodmoral-filename"] : $img_goodmoral_filename;
    $img_brgyclear_filename = $conn->real_escape_string($_FILES["img-brgyclearance"]["name"]);
    $img_brgyclear_filename = $img_brgyclear_filename === "" ? $_POST["img-brgyclear-filename"] : $img_brgyclear_filename;
    $img_transfercert_filename = $conn->real_escape_string($_FILES["img-transfercert"]["name"]);
    $img_transfercert_filename = $img_transfercert_filename === "" ? $_POST["img-transfercert-filename"] : $img_transfercert_filename;

    $completed =
        $name_first !== null &&
        $name_middle !== null &&
        $name_last !== null &&
        $email !== null &&
        $contact_num !== null &&
        $address !== null &&
        $citizenship !== null &&
        $civil_status !== null &&
        $rs_status !== null &&
        $birthdate !== null &&
        $sex !== null &&
        $mother_fname !== null &&
        $mother_mname !== null &&
        $mother_lname !== null &&
        $mother_contact !== null &&
        $mother_occupation !== null &&
        $father_fname !== null &&
        $father_mname !== null &&
        $father_lname !== null &&
        $father_contact !== null &&
        $father_occupation !== null &&
        $guardian_fname !== null &&
        $guardian_mname !== null &&
        $guardian_lname !== null &&
        $guardian_contact !== null &&
        $year_level !== null &&
        $first_choice !== null &&
        $second_choice !== null &&
        $prev_school !== null &&
        $img_profile_filename !== null &&
        $img_payment_filename !== null &&
        $img_birthcert_filename !== null &&
        $img_form137_filename !== null &&
        $img_form138_filename !== null &&
        $img_goodmoral_filename !== null &&
        $img_brgyclear_filename !== null;

    // execute the prepared statement
    try {
        if ($stmt->execute()) {
            $msg_type = "success";
            $msg_content = "Successfully submitted the user's information!";
        }
    } catch (mysqli_sql_exception $e) {
        // if user already has a record
        if ($e->getCode() == 1062) {
            $stmt = $conn->prepare("SELECT img_profile, img_profile_filename, img_payment, img_payment_filename, img_birthcert, img_birthcert_filename, img_form137, img_form137_filename, img_form138, img_form138_filename, img_goodmoral, img_goodmoral_filename, img_brgyclear, img_brgyclear_filename, img_transfercert, img_transfercert_filename FROM student_information WHERE user_id = ?");
            $stmt->bind_param("i", $_SESSION['user_id']);
            // get the existing images from the db
            $stmt->bind_result($db_img_profile, $db_img_profile_filename, $db_img_payment, $db_img_payment_filename, $db_img_birthcert, $db_img_birthcert_filename, $db_img_form137, $db_img_form137_filename, $db_img_form138, $db_img_form138_filename, $db_img_goodmoral, $db_img_goodmoral_filename, $db_img_brgyclear, $db_img_brgyclear_filename, $db_img_transfercert, $db_img_transfercert_filename);
            $stmt->execute();
            $stmt->fetch();
            $stmt->close();

            // replace the inputs if they're null so that the stored images on the db will not be overwritten
            $img_profile = $img_profile !== null ? $img_profile : $db_img_profile;
            $img_payment = $img_payment !== null ? $img_payment : $db_img_payment;
            $img_birthcert = $img_birthcert !== null ? $img_birthcert : $db_img_birthcert;
            $img_form137 = $img_form137 !== null ? $img_form137 : $db_img_form137;
            $img_form138 = $img_form138 !== null ? $img_form138 : $db_img_form138;
            $img_goodmoral = $img_goodmoral !== null ? $img_goodmoral : $db_img_goodmoral;
            $img_brgyclear = $img_brgyclear !== null ? $img_brgyclear : $db_img_brgyclear;
            $img_transfercert = $img_transfercert !== null ? $img_transfercert : $db_img_transfercert;

            $img_profile_filename = $img_profile_filename === null ? $db_img_profile_filename : $img_profile_filename;
            $img_payment_filename = $img_payment_filename === null ? $db_img_payment_filename : $img_payment_filename;
            $img_birthcert_filename = $img_birthcert_filename === null ? $db_img_birthcert_filename : $img_birthcert_filename;
            $img_form137_filename = $img_form137_filename === null ? $db_img_form137_filename : $img_form137_filename;
            $img_form138_filename = $img_form138_filename === null ? $db_img_form138_filename : $img_form138_filename;
            $img_goodmoral_filename = $img_goodmoral_filename === null ? $db_img_goodmoral_filename : $img_goodmoral_filename;
            $img_brgyclear_filename = $img_brgyclear_filename === null ? $db_img_brgyclear_filename : $img_brgyclear_filename;
            $img_transfercert_filename = $img_transfercert_filename === null ? $db_img_transfercert_filename : $img_transfercert_filename;

            $stmt = $conn->prepare("UPDATE student_information SET fname = ?, completed =?, mname = ?, lname = ?, email = ?, contact_num = ?, address = ?, citizenship = ?, civil_status = ?, rs_status = ?, occupation = ?, med_cond = ?, birthdate = ?, sex = ?, mother_fname = ?, mother_mname = ?, mother_lname = ?, mother_contact = ?, mother_occupation = ?, father_fname = ?, father_mname = ?, father_lname = ?, father_contact = ?, father_occupation = ?, guardian_fname = ?, guardian_mname = ?, guardian_lname = ?, guardian_contact = ?, year_level = ?, first_choice_course_id = ?, second_choice_course_id = ?, prev_school = ?, img_profile = ?, img_profile_filename = ?, img_payment = ?, img_payment_filename = ?, img_birthcert = ?, img_birthcert_filename = ?, img_form137 = ?, img_form137_filename = ?, img_form138 = ?, img_form138_filename = ?, img_goodmoral = ?, img_goodmoral_filename = ?, img_brgyclear = ?, img_brgyclear_filename = ?, img_transfercert = ?, img_transfercert_filename = ? WHERE user_id = ?");
            $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssi", $name_first, $completed, $name_middle, $name_last, $email, $contact_num, $address, $citizenship, $civil_status, $rs_status, $occupation, $med_condition, $birthdate, $sex, $mother_fname, $mother_mname, $mother_lname, $mother_contact, $mother_occupation, $father_fname, $father_mname, $father_lname, $father_contact, $father_occupation, $guardian_fname, $guardian_mname, $guardian_lname, $guardian_contact, $year_level, $first_choice, $second_choice, $prev_school, $img_profile, $img_profile_filename, $img_payment, $img_payment_filename, $img_birthcert, $img_birthcert_filename, $img_form137, $img_form137_filename, $img_form138, $img_form138_filename, $img_goodmoral, $img_goodmoral_filename, $img_brgyclear, $img_brgyclear_filename, $img_transfercert, $img_transfercert_filename, $user_id);

            try {
                if ($stmt->execute()) {
                    $msg_type = "success";
                    $msg_content = "Successfully updated the user's information!";
                }
            } catch (mysqli_sql_exception $e) {
                $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
            }
        } else {
            $msg_type = "danger";
            $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
        }
    }

    $stmt->close();
    $conn->close();
    header("Location: /dashboard/application?msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
