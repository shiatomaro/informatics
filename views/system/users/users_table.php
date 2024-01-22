<?php
require_once 'actions/db.php';
require_once 'utils.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id']) && !isset($queryParams['page'])) {
    header("Location: /system/users?page=1");
    $currentPage = 1;
    exit();
} else {
    $currentPage = $queryParams['page'];
}

$recordsPerPage = 10;
$offset = ($currentPage - 1) * $recordsPerPage;

// fetch data from the database
$conn = getConn();
$sql = "SELECT id, username, email, type, created_at, status FROM users LIMIT $recordsPerPage OFFSET $offset";
$result = $conn->query($sql);
$conn->close();

// Table pagination logic
$totalrecords = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
$totalPages = ceil($totalrecords / $recordsPerPage);
?>

<?php if ($result->num_rows > 0) : ?>
    <!-- Table -->
    <h1>User Records</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td scope="row"><?= $row['username'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['type'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><a class="btn btn-primary d-inline" href=<?= "/system/users?id={$row['id']}" ?> role="button">Edit</a>
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
                    <a class="<?= "page-link" . ($currentPage == 1 ? " disabled" : "") ?>" href=<?= "/system/users?page=" . ($currentPage - 1); ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i = 1; $i < $totalPages + 1; $i++) : ?>
                    <li class="page-item"><a class="<?= "page-link" . ($i == $currentPage ? " active" : ""); ?>" href=<?= "/system/users?page=$currentPage"; ?>><?= $i ?></a></li>
                <?php endfor ?>


                <li class="page-item">
                    <a class="<?= "page-link" . ($currentPage == $totalPages ? " disabled" : "") ?>" href=<?= "/system/users?page=" . ($currentPage + 1); ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php else : ?>
    <h2>No Users</h2>
<?php endif ?>