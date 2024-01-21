<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id'])) {
    header("Location: /system/users?page=1");
    exit();
}

// fetch data from the database
$conn = getConn();
$sql = "SELECT id, username, email, type, created_at, status FROM users WHERE id = {$queryParams['id']}";
$result = $conn->query($sql);
$userInfo = $result->fetch_assoc();
?>

<h1>User `<em><?= $userInfo["username"] ?></em>` Infomation</h1>

<?php include_once "views/message_card.php" ?>

<div class="container pt-3">
    <section>
        <form method="post" action="actions/update_userinfo_action.php">
            <input type="hidden" name="id" readonly value=<?= $userInfo['id'] ?>>
            <div class="input-group mb-3">
                <span class="input-group-text">Username</span>
                <input type="text" class="form-control" aria-label="Username" value=<?= $userInfo['username'] ?> name="username">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Email</span>
                <input type="email" class="form-control" aria-label="Email" value=<?= $userInfo['email'] ?> name="email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">User Type</span>
                <select class="form-control" name="type" aria-label="User Type">
                    <option value="student" <?= strtolower($userInfo['type']) == "student" ? "selected" : "" ?>>Student</option>
                    <option value="registrar" <?= strtolower($userInfo['type']) == "registrar" ? "selected" : "" ?>>registrar</option>
                    <option value="admin" <?= strtolower($userInfo['type']) == "admin" ? "selected" : "" ?>>admin</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">User Status</span>
                <select class="form-control" name="status" aria-label="User Status">
                    <option value="active" <?= strtolower($userInfo['status']) == "active" ? "selected" : "" ?>>active</option>
                    <option value="disabled" <?= strtolower($userInfo['status']) == "disabled" ? "selected" : "" ?>>disabled</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Account Created At</span>
                <input type="text" class="form-control" aria-label="Account created at" disabled readonly value=<?= $userInfo['created_at'] ?>>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="/system/users" role="button">Back</a>
                <button type="submit" class="btn btn-primary ms-2">Save</button>
            </div>
        </form>

    </section>
</div>