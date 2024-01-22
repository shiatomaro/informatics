<div class="card">
    <div class="card-body">
        <h4 class="card-title"><?php echo $title ?></h4>
        <?php if (sizeof($data) > 0) : ?>
            <canvas id=<?php echo preg_replace('/[^a-zA-Z0-9]/', '', $title) . "PieChart" ?>></canvas>
        <?php endif ?>
    </div>
    <div class="card-footer">
        <?php if (sizeof($data) > 0) : ?>
            <ul>
                <?php foreach ($labels as $index => $label) : ?>
                    <li><?php echo "$label: {$data[$index]}"; ?></li>
                <?php endforeach; ?>
                <li>Total: <?php echo array_sum($data); ?></li>
            </ul>
        <?php else : ?>
            <ul>
                <li>No data</li>
            </ul>
        <?php endif ?>
    </div>
</div>

<?php if (sizeof($data) > 0) : ?>
    <script>
        $(document).ready(function() {
            var data = <?php echo json_encode($data) ?>;
            var labels = <?php echo json_encode($labels) ?>;
            var pieData = {
                labels: <?php echo json_encode($labels) ?>,
                datasets: [{
                    data: data, // Adjust these values based on your data
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"], // Adjust these colors as needed
                }]
            };

            // get the chart title from the php variable then convert to string and remove all special characters
            var chartTitle = <?php echo json_encode($title) ?>.toString().replace(/[^a-zA-Z0-9]/g, '');
            // Get the context of the canvas element we want to put the chart in
            var ctx = document.getElementById(chartTitle + "PieChart").getContext("2d");

            // Create the pie chart
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: pieData,
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom',
                        }
                    }
                }
            });
        });
    </script>
<?php endif ?>