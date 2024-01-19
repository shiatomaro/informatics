<?php
require_once 'utils.php';
$queryParams = getQueryParams();
?>

<div class="container">
    <?php if (isset($queryParams['id'])) : ?>
        <?php include 'views/system/users/user_info.php'; ?>
    <?php else : ?>
        <?php include 'views/system/users/users_table.php'; ?>
    <?php endif ?>
</div>