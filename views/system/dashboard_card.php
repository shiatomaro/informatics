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
                    backgroundColor: [
                        "#FF6384",
                        "#36A2EB",
                        "#FFCE56",
                        "#f4befa",
                        "#9e9784",
                        "#8b15c0",
                        "#54d598",
                        "#2a1e08",
                        "#e0a1d1",
                        "#36cb67",
                        "#a64446",
                        "#fb414a",
                        "#09f818",
                        "#947043",
                        "#85639f",
                        "#611cea",
                        "#ad07a6",
                        "#2160fb",
                        "#d75399",
                        "#6bf0ee",
                        "#73865b",
                        "#5bd493",
                        "#259109",
                        "#1bf6a9",
                        "#c96e44",
                        "#ac9fad",
                        "#9e5d8f",
                        "#d60864",
                        "#f575da",
                        "#e490f3",
                        "#7311c7",
                        "#d3a433",
                        "#8379f8",
                        "#a8aaf8",
                        "#5b2eec",
                        "#0cae69",
                        "#d9f947",
                        "#709592",
                        "#6df8cf",
                        "#1ae68a",
                        "#9cf9f3",
                        "#a183c8",
                        "#073add",
                        "#d48599",
                        "#46596e",
                        "#310e59",
                        "#b62c73",
                        "#e5dc2c",
                        "#a4e200",
                        "#53280b",
                        "#db7d6d",
                        "#af6a47",
                        "#7eacc9",
                        "#ea89e4",
                        "#b544f0",
                        "#13e40a",
                        "#17d2f2",
                        "#674ed1",
                        "#095271",
                        "#88e2d7",
                        "#e814e0",
                        "#31e4fd",
                        "#cd9883",
                        "#134c72",
                        "#4c6290",
                        "#1b2c77",
                        "#61a645",
                        "#76ae7b",
                        "#6af6af",
                        "#23194e",
                        "#6ff47e",
                        "#106d17",
                        "#9cb2a0",
                        "#e3cf65",
                    ]
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