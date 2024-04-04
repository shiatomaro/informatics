<?php
require_once 'utils.php';
require_once 'actions/db.php';
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
$sql = "
    SELECT si.id, si.fname, si.mname, si.lname, fc.name AS first_choice, sc.name AS second_choice, si.year_level 
    FROM student_information si
    LEFT JOIN courses fc ON si.first_choice_course_id = fc.id
    LEFT JOIN courses sc ON si.second_choice_course_id = sc.id
    LIMIT $recordsPerPage 
    OFFSET $offset
    ";
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
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Year Level</th>
                <th scope="col">Second Choice Course</th>
                <th scope="col">First Choice Course</th>
                <th scope="col">Info</th>
            </tr>
        </thead>

        <tbody>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td scope="row"><?= $row['id']; ?></td>
                    <td scope="row"><?= "{$row['fname']} {$row['mname']} {$row['lname']}"; ?></td>
                    <td scope="row"><?= $row['year_level']; ?></td>
                    <td scope="row"><?= $row['first_choice']; ?></td>
                    <td scope="row"><?= $row['second_choice']; ?></td>
                    <td><a class="btn btn-primary d-inline" href=<?= "/system/students?id={$row['id']}" ?> role="button">info</a></td>
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
<div class="container">
    <div class="row">
        <div class="span3 hidden-phone"></div>
        <div class="span6" id="form-login">
            <form class="form-horizontal well" action="views/system/students/import.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <fieldset>
                    <legend>Import CSV/Excel file</legend>
                    <div class="control-group">
                        <div class="control-label">
                            <label>CSV/Excel File:</label>
                        </div>
                        <div class="controls">
                            <input type="file" name="file" id="file" class="input-large">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span3 hidden-phone"></div>
    </div>
</div>