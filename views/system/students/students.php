<?php
require_once 'utils.php';
require_once 'actions/db.php';
$queryParams = getQueryParams();
?>

<div class="container">
    <?php if (isset($queryParams['user_id']) || isset($queryParams['id'])) : ?>
        <?php include 'views/system/students/student_info.php'; ?>
    <?php else : ?>
        <?php include 'views/system/students/students_table.php'; ?>
    <?php endif ?>
</div>