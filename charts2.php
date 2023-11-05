<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var jsonData = <?php

            include('config.php');

                $query = "SELECT SUM(sementes) AS total_sementes, SUM(fertilizante) AS total_fertilizante, SUM(pesticida) AS total_pesticida, SUM(adubo) AS total_adubo, SUM(irrigacao) AS total_irrigacao FROM custos_prj5";
                $result = $conexao->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $total_values = array_sum($row);
                    arsort($row);
                    $top_three = array_slice($row, 0, 3, true);

                    $percentages = [];
                    foreach ($top_three as $key => $value) {
                        $percentage = ($value / $total_values) * 100;
                        $percentages[$key] = $percentage;
                    }

                    echo json_encode($percentages);
                } else {
                    echo json_encode([]);
                }

                $conexao->close();
            ?>;
            
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Custo');
            data.addColumn('number', 'Porcentagem');

            for (var key in jsonData) {
                data.addRow([key, jsonData[key]]);
            }

            var options = {
                pieHole: 0.4,
                legend: { position: 'bottom', maxLines: 5 }
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="donutchart" style="width: 500px; height: 500px; margin-top: -10px;"></div>
</body>
</html>
