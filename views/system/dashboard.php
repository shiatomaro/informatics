<?php
require_once "actions/db.php";
require_once "utils.php";

$conn = getConn();

// Get users data from the database
$sql = "SELECT type, COUNT(*) as count FROM users GROUP BY type";
$result = $conn->query($sql);
$usersData = [];
if ($result->num_rows > 0) {
    $labels = [];
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['type'];
        $data[] = (int)$row['count'];
    }
    $usersData = [
        'labels' => $labels,
        'data' => $data,
    ];
}

// Get applications data from the database
$sql = "SELECT status, COUNT(*) as count FROM student_applications GROUP BY status";
$result = $conn->query($sql);
$applicationsData = [];
if ($result->num_rows > 0) {
    $labels = [];
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['status'];
        $data[] = (int)$row['count'];
    }
    $applicationsData = [
        'labels' => $labels,
        'data' => $data,
    ];
}

// Get applications, sorted per year level
$sql = "SELECT si.year_level, COUNT(sa.user_id) as count
        FROM student_applications sa
        LEFT JOIN student_information si ON sa.user_id = si.user_id
        GROUP BY si.year_level
        ";
$result = $conn->query($sql);
$labels = [];
$data = [];
$acceptedPerYrLvl = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['year_level'];
        $data[] = (int)$row['count'];
    }
    $acceptedPerYrLvl = [
        'labels' => $labels,
        'data' => $data,
    ];
}

// Get applications, sorted per course
$sql = "SELECT fc.name as course_name, COUNT(sa.user_id) as count 
        FROM student_applications sa
        LEFT JOIN student_information si ON sa.user_id = si.user_id
        LEFT JOIN courses fc ON si.first_choice_course_id = fc.id
        GROUP BY fc.name";
$result = $conn->query($sql);
$labels = [];
$data = [];
$acceptedPerCourse = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['course_name'];
        $data[] = (int)$row['count'];
    }
    $acceptedPerCourse = [
        'labels' => $labels,
        'data' => $data,
    ];
}

// Get applications, sorted by previous school
$sql = "SELECT si.prev_school, COUNT(sa.user_id) as count 
        FROM student_applications sa
        LEFT JOIN student_information si ON sa.user_id = si.user_id
        GROUP BY si.prev_school";
$result = $conn->query($sql);
$labels = [];
$data = [];
$acceptedPerPrevSchool = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['prev_school'];
        $data[] = (int)$row['count'];
    }
    $acceptedPerPrevSchool = [
        'labels' => $labels,
        'data' => $data,
    ];
}

$conn->close();

// prepare cards data: 
// CARD_TITLE => DATA
$cardsData = array(
    "Users" => $usersData,
    "Applications" => $applicationsData,
    "Applications (Per Year Level)" => $acceptedPerYrLvl,
    "Applications (Per Course)" => $acceptedPerCourse,
    "Applications (Per Previous School)" => $acceptedPerPrevSchool,
);

?>

<h1>Dashboard</h1>
<div class="container row g-3 mx-auto">
    <!-- create a card for each item in the cardsData array -->
    <?php foreach ($cardsData as $title => $data) : ?>
        <div class="col-sm-12 col-md-6">
            <?php
            extract($data);
            require 'views/system/dashboard_card.php';
            ?>
        </div>
    <?php endforeach; ?>

</div>