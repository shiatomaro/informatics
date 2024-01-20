<?php
require_once 'utils.php';
$queryParams = getQueryParams();
?>

<div class="container">
    <?php if (isset($queryParams['code'])) : ?>
        <?php include 'views/system/courses/course_info.php'; ?>
    <?php else : ?>
        <?php include 'views/system/courses/courses_table.php'; ?>
    <?php endif ?>
</div>