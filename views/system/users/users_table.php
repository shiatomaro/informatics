<?php
require_once 'actions/db.php';

$queryParams = getQueryParams();
if (!isset($queryParams['id']) && !isset($queryParams['page'])) {
    header("Location: /system/users?page=1");
    $currentPage = 1;
    exit();
} else {
    $currentPage = isset($queryParams['page']) ? $queryParams['page'] : 1;
}

$recordsPerPage = 10;
$offset = ($currentPage - 1) * $recordsPerPage;

// Fetch data from the database
$conn = getConn();
$sql = "SELECT id, username, email, type, created_at, status FROM users LIMIT $recordsPerPage OFFSET $offset";
$result = $conn->query($sql);

// Table pagination logic
$totalrecords = $conn->query("SELECT COUNT(*) as total FROM users")->fetch_assoc()['total'];
$totalPages = ceil($totalrecords / $recordsPerPage);
$conn->close();
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
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['type']) ?></td>
                    <td><?= htmlspecialchars($row['created_at']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                        <a class="btn btn-primary" href="/system/users?id=<?= $row['id'] ?>" role="button">Edit</a>
                        <a class="btn btn-danger" href="/system/users/delete?id=<?= $row['id'] ?>" role="button" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

    <!-- Paginator -->
    <div class="container">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                    <a class="page-link" href="/system/users?page=<?= ($currentPage - 1) ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                        <a class="page-link" href="/system/users?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor ?>

                <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                    <a class="page-link" href="/system/users?page=<?= ($currentPage + 1) ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php else : ?>
    <h2>No Users</h2>
<?php endif ?>
