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
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $user_id = isset($emapData[0]) ? $emapData[0] : null;

            // Insert data into the student_information table
            $sql = "INSERT INTO student_information (fname, mname, lname, first_choice_course_id, second_choice_course_id, year_level) 
                    VALUES ( '$emapData[0]', '$emapData[1]', '$emapData[2]', '$emapData[3]', '$emapData[4]', '$emapData[5]')";
            $result = $conn->query($sql);
            if (!$result) {
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
