<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id']) && !isset($queryParams['page'])) {
    header("Location: /system/students?page=1");
    $currentPage = 1;
    exit();
} else {
    $currentPage = $queryParams['page'];
}

$recordsPerPage = 10;
$offset = ($currentPage - 1) * $recordsPerPage;

// fetch data from the database
$conn = getConn();
$sql = "SELECT student_num, name_prefix, first_name, middle_name, last_name, name_suffix, course_id, year_level FROM student_information LIMIT $recordsPerPage OFFSET $offset";
$result = $conn->query($sql);

// Table pagination logic
$totalrecords = $conn->query("SELECT COUNT(*) as total FROM student_information")->fetch_assoc()['total'];
$totalPages = ceil($totalrecords / $recordsPerPage);
?>

<?php if ($result->num_rows > 0) : ?>
    <h1>Student Records</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Student Number</th>
                <th scope="col">Full Name</th>
                <th scope="col">Course</th>
                <th scope="col">Year Level</th>
                <th scope="col">Info</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td scope="row"><?= $row['student_num']; ?></td>
                    <td scope="row"><?= "{$row['name_prefix']} {$row['first_name']} {$row['middle_name']} {$row['last_name']} {$row['name_suffix']}"; ?></td>
                    <td scope="row"><?= $row['course_id']; ?></td>
                    <td scope="row"><?= $row['year_level']; ?></td>
                    <td><a class="btn btn-primary d-inline" href=<?= "/system/students?studNum={$row['student_num']}" ?> role="button">info</a></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <!-- Paginator -->
    <div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="<?= "page-link" . ($currentPage == 1 ? " disabled" : "") ?>" href=<?= "/system/students?page=" . ($currentPage - 1); ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i = 1; $i < $totalPages + 1; $i++) : ?>
                    <li class="page-item"><a class="<?= "page-link" . ($i == $currentPage ? " active" : ""); ?>" href=<?= "/system/students?page=$currentPage"; ?>><?= $i ?></a></li>
                <?php endfor ?>


                <li class="page-item">
                    <a class="<?= "page-link" . ($currentPage == $totalPages ? " disabled" : "") ?>" href=<?= "/system/students?page=" . ($currentPage + 1); ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php else : ?>
    <h2>No student records found</h2>
<?php endif ?>