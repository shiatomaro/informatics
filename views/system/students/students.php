<?php
require_once 'utils.php';
$queryParams = getQueryParams();
?>

<div class="container">
    <?php if (isset($queryParams['studNum'])) : ?>
        <?php include 'views/system/students/student_info.php'; ?>
    <?php else : ?>
        <?php include 'views/system/students/students_table.php'; ?>
    <?php endif ?>
</div>