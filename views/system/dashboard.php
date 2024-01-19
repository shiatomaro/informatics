<?php
// Sample PHP code to fetch data from the server
$usersData = array(
    'labels' => ["Student", "Registrar", "Admin"],
    'data' => [10, 3, 2],
);
$applicationsData = array(
    'labels' => ["Accepted", "Rejected", "Pending"],
    'data' => [15, 3, 8],
);
$acceptedDataPerYrLvl = array(
    'labels' => ["1st Year", "2nd Year", "3rd Year"],
    'data' => [28, 40, 33],
);
$acceptedDataPerCourse = array(
    'labels' => ["ComSci", "IT", "MMA"],
    'data' => [28, 29, 25],
);
?>

<h1>Dashboard</h1>
<div class="container row g-3">
    <?php
    // prepare cards data: 
    // CARD_TITLE => DATA
    $cardsData = array(
        "Users" => $usersData,
        "Applications" => $applicationsData,
        "Accepted (Per Year Level)" => $acceptedDataPerYrLvl,
        "Accepted (Per Course)" => $acceptedDataPerCourse
    );
    ?>

    <!-- create a card for each item in the cardsData array -->
    <?php foreach ($cardsData as $title => $data) : ?>
        <div class="col col-md-6">
            <?php
            extract($data);
            require 'views/system/dashboard_card.php';
            ?>
        </div>
    <?php endforeach; ?>

</div>