<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['code']) && !isset($queryParams['page'])) {
    header("Location: /system/courses?page=1");
    $currentPage = 1;
    exit();
} else {
    $currentPage = $queryParams['page'];
}

$recordsPerPage = 10;
$offset = ($currentPage - 1) * $recordsPerPage;

// fetch data from the database
$conn = getConn();
$sql = "SELECT code, name, instructor, status FROM courses LIMIT $recordsPerPage OFFSET $offset";
$result = $conn->query($sql);

// Table pagination logic
$totalrecords = $conn->query("SELECT COUNT(*) as total FROM courses")->fetch_assoc()['total'];
$totalPages = ceil($totalrecords / $recordsPerPage);
?>

<?php if ($result->num_rows > 0) : ?>
    <!-- Table -->
    <div class="d-flex align-items-center">
        <h1>Courses</h1>
        <a class="btn btn-primary ms-auto" href="/system/courses/new" role="button">New Course</a>
    </div>
    <?php include_once "views/message_card.php"; ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Instructor</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td scope="row"><?= $row['code'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['instructor'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><a class="btn btn-primary d-inline" href=<?= "/system/courses?code={$row['code']}" ?> role="button">Edit</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <!-- Paginator -->
    <div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="<?= "page-link" . ($currentPage == 1 ? " disabled" : "") ?>" href=<?= "/system/courses?page=" . ($currentPage - 1); ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i = 1; $i < $totalPages + 1; $i++) : ?>
                    <li class="page-item"><a class="<?= "page-link" . ($i == $currentPage ? " active" : ""); ?>" href=<?= "/system/courses?page=$currentPage"; ?>><?= $i ?></a></li>
                <?php endfor ?>


                <li class="page-item">
                    <a class="<?= "page-link" . ($currentPage == $totalPages ? " disabled" : "") ?>" href=<?= "/system/courses?page=" . ($currentPage + 1); ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php else : ?>
    <h2>There are no courses yet.</h2>
    <a class="btn btn-primary" href="/system/courses/new" role="button">Create a new course</a>
<?php endif ?>