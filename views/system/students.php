<?php
// dummy data
$studentsData = array(
    2024191 => array(
        'name' => 'Juan Dela Cruz',
        'course' => 'IT',
        'yrLvl' => '2nd',
    ),
    1024192 => array(
        'name' => 'Juan Luna',
        'course' => 'PE',
        'yrLvl' => '10th',
    ),
);

require_once 'utils.php';
$queryParams = getQueryParams();
$studNum = $queryParams !== null ? $queryParams['studNum'] : null;
?>

<div class="container">
    <table class="table table-hover">
        <?php if ($queryParams === null) {
            include 'views/system/students_table.php';
        } else {
            include 'views/system/student_info.php';
        }
        ?>
    </table>
</div>