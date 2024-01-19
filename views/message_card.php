<?php if (isset($queryParams['msg_content'])) : ?>
    <div class="<?= "card text-bg-" . $queryParams['msg_type']; ?>">
        <div class="card-body">
            <?= $queryParams['msg_content'] ?>
        </div>
    </div>
<?php endif ?>