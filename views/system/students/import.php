<?php
require_once '../../../actions/db.php';
require_once '../../../utils.php';
require_once '../../../controllers/credentials.php';

$conn = getConn();

// Check if the form is submitted
if (isset($_POST["Import"])) {
    $filename = $_FILES["file"]["tmp_name"];

    // Check if file is not empty
    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        
        // Loop through each row in the CSV file
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            // Ensure the array has 30 elements
            $emapData = array_pad($emapData, 30, '');

            // Sanitize and escape each value before inserting into the database
            $values = array_map(function($value) use ($conn) {
                return mysqli_real_escape_string($conn, $value);
            }, $emapData);
            
            // Prepare the SQL statement using a prepared statement
            $sql = "INSERT INTO student_information (fname, mname, lname, email, contact_num, address, citizenship, civil_status, med_cond, birthdate, sex, 
                    mother_fname, mother_mname, mother_lname, mother_contact, mother_occupation, father_fname, father_mname, father_lname, father_contact, father_occupation, 
                    guardian_fname, guardian_mname, guardian_lname, guardian_contact,  year_level, first_choice_course_id, second_choice_course_id, prev_school) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Create a prepared statement
            $stmt = $conn->prepare($sql);
            // Check if the prepared statement was successfully created
            if ($stmt === false) {
                echo "<script type=\"text/javascript\">
                        alert(\"Error: Unable to prepare SQL statement.\");
                        window.location = \"students_table.php\";
                      </script>";
                exit; // Exit script on error
            }

            // Bind parameters with the values and execute the statement
            $stmt->bind_param("sssssssssssssssssssssssssssss", 
            $values[0],  // fname
            $values[1],  // mname
            $values[2],  // lname
            $values[3],  // email
            $values[4],  // contact_num
            $values[5],  // address
            $values[6],  // citizenship
            $values[7],  // civil_status
            $values[8],  // med_cond
            $values[9],  // birthdate
            $values[10], // sex
            $values[11], // first_choice_course_id
            $values[12], // second_choice_course_id
            $values[13], // year_level
            $values[14], // mother_fname
            $values[15], // mother_mname
            $values[16], // mother_lname
            $values[17], // mother_contact
            $values[18], // mother_occupation
            $values[19], // father_fname
            $values[20], // father_mname
            $values[21], // father_lname
            $values[22], // father_contact
            $values[23], // father_occupation
            $values[24], // guardian_fname
            $values[25], // guardian_mname
            $values[26], // guardian_lname
            $values[27], // guardian_contact
            $values[28]  // prev_school
        );
        

        $stmt->execute();

        // Check for errors and handle them
        if ($stmt->error) {
            echo "<script type=\"text/javascript\">
                    alert(\"Error: Unable to import CSV file.\");
                    window.location = \"students_table.php\";
                  </script>";
            exit; // Exit script on error
        }
    }
    fclose($file);

    // Display success message after importing CSV data
    echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully imported.\");
            window.location = \"students_table.php\";
          </script>";
}
}
?>
