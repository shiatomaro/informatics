<?php
require_once './db.php';
require_once '../controllers/credentials.php';
require_once '../utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    requireCredentials();
    $pdo = getPDO();

    // Prepare and bind the SQL statement
    $stmt = $pdo->prepare(
        "INSERT INTO student_information
        (user_id, completed, fname, mname, lname, email, contact_num, address, citizenship, civil_status, rs_status, occupation, med_cond, birthdate, sex, mother_fname, mother_mname, mother_lname, mother_contact, mother_occupation, father_fname, father_mname, father_lname, father_contact, father_occupation, guardian_fname, guardian_mname, guardian_lname, guardian_contact, year_level, first_choice_course_id, second_choice_course_id, prev_school, img_profile, img_profile_filename, img_payment, img_payment_filename, img_birthcert, img_birthcert_filename, img_form137, img_form137_filename, img_form138, img_form138_filename, img_goodmoral, img_goodmoral_filename, img_brgyclear, img_brgyclear_filename, img_transfercert, img_transfercert_filename)
        VALUES (:user_id, :completed, :fname, :mname, :lname, :email, :contact_num, :address, :citizenship, :civil_status, :rs_status, :occupation, :med_cond, :birthdate, :sex, :mother_fname, :mother_mname, :mother_lname, :mother_contact, :mother_occupation, :father_fname, :father_mname, :father_lname, :father_contact, :father_occupation, :guardian_fname, :guardian_mname, :guardian_lname, :guardian_contact, :year_level, :first_choice_course_id, :second_choice_course_id, :prev_school, :img_profile, :img_profile_filename, :img_payment, :img_payment_filename, :img_birthcert, :img_birthcert_filename, :img_form137, :img_form137_filename, :img_form138, :img_form138_filename, :img_goodmoral, :img_goodmoral_filename, :img_brgyclear, :img_brgyclear_filename, :img_transfercert, :img_transfercert_filename);
        "
    );
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':completed', $completed);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':mname', $mname);
    $stmt->bindParam(':lname', $lname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contact_num', $contact_num);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':citizenship', $citizenship);
    $stmt->bindParam(':civil_status', $civil_status);
    $stmt->bindParam(':rs_status', $rs_status);
    $stmt->bindParam(':occupation', $occupation);
    $stmt->bindParam(':med_cond', $med_cond);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':mother_fname', $mother_fname);
    $stmt->bindParam(':mother_mname', $mother_mname);
    $stmt->bindParam(':mother_lname', $mother_lname);
    $stmt->bindParam(':mother_contact', $mother_contact);
    $stmt->bindParam(':mother_occupation', $mother_occupation);
    $stmt->bindParam(':father_fname', $father_fname);
    $stmt->bindParam(':father_mname', $father_mname);
    $stmt->bindParam(':father_lname', $father_lname);
    $stmt->bindParam(':father_contact', $father_contact);
    $stmt->bindParam(':father_occupation', $father_occupation);
    $stmt->bindParam(':guardian_fname', $guardian_fname);
    $stmt->bindParam(':guardian_mname', $guardian_mname);
    $stmt->bindParam(':guardian_lname', $guardian_lname);
    $stmt->bindParam(':guardian_contact', $guardian_contact);
    $stmt->bindParam(':year_level', $year_level);
    $stmt->bindParam(':first_choice_course_id', $first_choice);
    $stmt->bindParam(':second_choice_course_id', $second_choice);
    $stmt->bindParam(':prev_school', $prev_school);
    $stmt->bindParam(':img_profile', $img_profile);
    $stmt->bindParam(':img_profile_filename', $img_profile_filename);
    $stmt->bindParam(':img_payment', $img_payment);
    $stmt->bindParam(':img_payment_filename', $img_payment_filename);
    $stmt->bindParam(':img_birthcert', $img_birthcert);
    $stmt->bindParam(':img_birthcert_filename', $img_birthcert_filename);
    $stmt->bindParam(':img_form137', $img_form137);
    $stmt->bindParam(':img_form137_filename', $img_form137_filename);
    $stmt->bindParam(':img_form138', $img_form138);
    $stmt->bindParam(':img_form138_filename', $img_form138_filename);
    $stmt->bindParam(':img_goodmoral', $img_goodmoral);
    $stmt->bindParam(':img_goodmoral_filename', $img_goodmoral_filename);
    $stmt->bindParam(':img_brgyclear', $img_brgyclear);
    $stmt->bindParam(':img_brgyclear_filename', $img_brgyclear_filename);
    $stmt->bindParam(':img_transfercert', $img_transfercert);
    $stmt->bindParam(':img_transfercert_filename', $img_transfercert_filename);

    @session_start();
    $user_id = $_SESSION['user_id'];

    // fetch the data from the form
    $fname = $_POST['name-first'] !== '' ? $_POST['name-first'] : null;
    $mname = $_POST['name-middle'] !== '' ? $_POST['name-middle'] : null;
    $lname = $_POST['name-last'] !== '' ? $_POST['name-last'] : null;
    $email = $_POST['email'] !== '' ? $_POST['email'] : null;
    $contact_num = $_POST['contact-num'] !== '' ? $_POST['contact-num'] : null;
    $address = $_POST['address'] !== '' ? $_POST['address'] : null;
    $citizenship = $_POST['citizenship'] !== '' ? $_POST['citizenship'] : null;
    $civil_status = $_POST['civil-status'] !== '' ? $_POST['civil-status'] : null;
    $rs_status = $_POST['rs-status'] !== '' ? $_POST['rs-status'] : null;
    $occupation = $_POST['occupation'] !== '' ? $_POST['occupation'] : null;
    $med_cond = $_POST['med-condition'] !== '' ? $_POST['med-condition'] : null;
    $birthdate = $_POST['birthdate'] !== '' ? $_POST['birthdate'] : null;
    $sex = $_POST['sex'] !== '' ? $_POST['sex'] : null;

    $mother_fname = $_POST['mother-name-first'] !== '' ? $_POST['mother-name-first'] : null;
    $mother_mname = $_POST['mother-name-middle'] !== '' ? $_POST['mother-name-middle'] : null;
    $mother_lname = $_POST['mother-name-last'] !== '' ? $_POST['mother-name-last'] : null;
    $mother_contact = $_POST['mother-contact'] !== '' ? $_POST['mother-contact'] : null;
    $mother_occupation = $_POST['mother-occupation'] !== '' ? $_POST['mother-occupation'] : null;

    $father_fname = $_POST['father-name-first'] !== '' ? $_POST['father-name-first'] : null;
    $father_mname = $_POST['father-name-middle'] !== '' ? $_POST['father-name-middle'] : null;
    $father_lname = $_POST['father-name-last'] !== '' ? $_POST['father-name-last'] : null;
    $father_contact = $_POST['father-contact'] !== '' ? $_POST['father-contact'] : null;
    $father_occupation = $_POST['father-occupation'] !== '' ? $_POST['father-occupation'] : null;

    $guardian_fname = $_POST['guardian-name-first'] !== '' ? $_POST['guardian-name-first'] : null;
    $guardian_mname = $_POST['guardian-name-middle'] !== '' ? $_POST['guardian-name-middle'] : null;
    $guardian_lname = $_POST['guardian-name-last'] !== '' ? $_POST['guardian-name-last'] : null;
    $guardian_contact = $_POST['guardian-contact'] !== '' ? $_POST['guardian-contact'] : null;

    $year_level = $_POST['grade-level'] !== '' ? $_POST['grade-level'] : null;
    $first_choice = $_POST['choice-1'] !== '' ? $_POST['choice-1'] : null;
    $second_choice = $_POST['choice-2'] !== '' ? $_POST['choice-2'] : null;
    $prev_school_dropdown = $_POST['prev-school-dropdown'] !== '' ? $_POST['prev-school-dropdown'] : null;
    $prev_school_input = $_POST['prev-school-input'] !== '' ? $_POST['prev-school-input'] : null;
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
    $img_profile_filename =  $_POST["img-profile-filename"] === "" ? $_POST["img-profile-filename"] : null;
    $img_payment_filename =  $_POST["img-payment-filename"] === "" ? $_POST["img-payment-filename"] : $img_payment_filename;
    $img_birthcert_filename =  $_POST["img-birthcert-filename"] === "" ? $_POST["img-birthcert-filename"] : $img_birthcert_filename;
    $img_form137_filename =  $_POST["img-form137-filename"] === "" ? $_POST["img-form137-filename"] : $img_form137_filename;
    $img_form138_filename =  $_POST["img-form138-filename"] === "" ? $_POST["img-form138-filename"] : $img_form138_filename;
    $img_goodmoral_filename =  $_POST["img-goodmoral-filename"] === "" ? $_POST["img-goodmoral-filename"] : $img_goodmoral_filename;
    $img_brgyclear_filename =  $_POST["img-brgyclear-filename"] === "" ? $_POST["img-brgyclear-filename"] : $img_brgyclear_filename;
    $img_transfercert_filename =  $_POST["img-transfercert-filename"] === "" ? $_POST["img-transfercert-filename"] : $img_transfercert_filename;

    // image validation
    foreach ($_FILES as $file) {
        // if a file isnt jpeg or png, do not insert into the database and display an error message
        if ($file["tmp_name"] !== "" && !validateImg($file["tmp_name"])) {
            $msg_type = "danger";
            $msg_content = "Please replace `{$file["name"]}` with either a JPEG or PNG file.";
            header("Location: /dashboard/application?msg_type=$msg_type&msg_content=$msg_content");
            exit();
        }
    }

    $completed =
        $fname !== null &&
        $mname !== null &&
        $lname !== null &&
        $email !== null &&
        $contact_num !== null &&
        $address !== null &&
        $citizenship !== null &&
        $civil_status !== null &&
        $birthdate !== null &&
        $sex !== null &&
        $year_level !== null &&
        $first_choice !== null &&
        $second_choice !== null &&
        $prev_school !== null &&
        $img_profile_filename !== null;

    // execute the prepared statement
    try {
        if ($stmt->execute()) {
            $msg_type = "success";
            $msg_content = "Successfully submitted the user's information!";
        }
    } catch (PDOException $e) {
        if ($e->getCode() === "23000") {
            $msg_type = "danger";
            $msg_content = "Cannot create a new application, the user already has an existing application. Try updating the old one instead.";
        } else {
            $msg_type = "danger";
            $msg_content = "An unknown error has occured (" . $e->getCode() . "): " . $e->getMessage();
        }
    }

    $pdo = null;
    header("Location: /dashboard/application?msg_type=$msg_type&msg_content=$msg_content");
    exit();
}
