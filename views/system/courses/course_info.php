<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id'])) {
    header("Location: /system/courses?page=1");
    exit();
}

// fetch data from the database
$conn = getConn();
$stmt = $conn->prepare("SELECT id, code, name, description, status FROM courses WHERE id = ?");
$course_id = $conn->real_escape_string($queryParams['id']);
$stmt->bind_param("s", $course_id);
$stmt->execute();
$result = $stmt->get_result();
$courseInfo = $result->fetch_assoc();
?>

<h1>Course `<em><?= $courseInfo["code"] ?></em>` Infomation</h1>

<div class="container pt-3">
    <section>
        <form method="post" action="actions/update_course_action.php">
            <input type="hidden" name="course_id" readonly value=<?= $courseInfo['id'] ?>>
            <div class="input-group mb-3">
                <span class="input-group-text">Course Code</span>
                <input type="text" class="form-control" aria-label="Course Code" value=<?= $courseInfo['code'] ?> name="course_code">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Course Name</span>
                <input type="text" class="form-control" aria-label="Course Name" value=<?= $courseInfo['name'] ?> name="course_name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Course Description</span>
                <textarea class="form-control" name="course_desc" aria-label="Course Description" rows="3"><?= $courseInfo['description'] ?></textarea>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Course Status</span>
                <select class="form-control" name="course_status" aria-label="Course Status">
                    <option value="open" <?= strtolower($courseInfo['status']) == "open" ? "selected" : "" ?>>Open</option>
                    <option value="closed" <?= strtolower($courseInfo['status']) == "closed" ? "selected" : "" ?>>Closed</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="/system/courses" role="button">Back</a>
                <button type="submit" class="btn btn-primary ms-2">Save</button>
            </div>
        </form>

    </section>
</div>