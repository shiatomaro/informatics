<?php
require_once 'utils.php';
$queryParams = getQueryParams();
?>

<div class="container">
    <?php if (isset($queryParams['user_id'])) : ?>
        <?php include 'views/system/applications/application_info.php'; ?>
    <?php else : ?>
        <?php include 'views/system/applications/applications_table.php'; ?>
    <?php endif ?>
</div>