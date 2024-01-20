<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['code'])) {
    header("Location: /system/courses?page=1");
    exit();
}

// fetch data from the database
$conn = getConn();
// $sql = "SELECT * FROM student_information WHERE student_num = {$queryParams['studNum']}";
$stmt = $conn->prepare("SELECT code, name, description, instructor, status FROM courses WHERE code = ?");
$course_code = $conn->real_escape_string($queryParams['code']);
$stmt->bind_param("s", $course_code);
$stmt->execute();
$result = $stmt->get_result();
$courseInfo = $result->fetch_assoc();
?>

<h1>Course `<em><?= $courseInfo["code"] ?></em>` Infomation</h1>

<?php include_once "views/message_card.php" ?>

<div class="container pt-3">
    <section>
        <form method="post" action="actions/update_course_action.php">
            <input type="hidden" name="code" readonly value=<?= $courseInfo['code'] ?>>
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
                <span class="input-group-text">Instructor</span>
                <input type="text" class="form-control" aria-label="Instructor" value="<?= $courseInfo['instructor'] ?>" name="course_inst">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Course Status</span>
                <select class="form-control" name="course_status" aria-label="Course Status">
                    <option value="scheduled" <?= strtolower($courseInfo['status']) == "scheduled" ? "selected" : "" ?>>Scheduled</option>
                    <option value="open" <?= strtolower($courseInfo['status']) == "open" ? "selected" : "" ?>>Open</option>
                    <option value="closed" <?= strtolower($courseInfo['status']) == "closed" ? "selected" : "" ?>>Closed</option>
                    <option value="canceled" <?= strtolower($courseInfo['status']) == "canceled" ? "selected" : "" ?>>Canceled</option>
                    <option value="waitlisted" <?= strtolower($courseInfo['status']) == "waitlisted" ? "selected" : "" ?>>Waitlisted</option>
                    <option value="completed" <?= strtolower($courseInfo['status']) == "completed" ? "selected" : "" ?>>Completed</option>
                    <option value="in progress" <?= strtolower($courseInfo['status']) == "in progress" ? "selected" : "" ?>>In progress</option>
                    <option value="suspended" <?= strtolower($courseInfo['status']) == "suspended" ? "selected" : "" ?>>Suspended</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-secondary" href="/system/courses" role="button">Back</a>
                <button type="submit" class="btn btn-primary ms-2">Save</button>
            </div>
        </form>

    </section>
</div>