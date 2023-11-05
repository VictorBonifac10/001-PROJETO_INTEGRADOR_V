<?php
include("config.php");

// Consulta para recuperar os dados
$sql = "SELECT mes, SUM(sementes + fertilizante + pesticida + adubo + irrigacao) AS total 
        FROM custos_prj5 
        GROUP BY mes 
        ORDER BY FIELD(mes, 'dezembro', 'novembro', 'outubro', 'setembro', 'agosto', 'julho', 'junho', 'maio', 'abril', 'março', 'fevereiro', 'janeiro') ASC
        LIMIT 3";

$result = $conexao->query($sql);

$dataArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = array($row['mes'], (int)$row['total']);


    }
} else {
    echo "Nenhum resultado encontrado.";
}

$conexao->close();

?>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['mes', 'Valores'],
        <?php
          foreach ($dataArray as $data) {
            echo "['" . $data[0] . "', " . $data[1] . "],";
          }
        ?>
      ]);

      var options = {
        curveType: 'function',
        legend: { position: 'bottom' },
        pointSize: 5 // Tamanho dos pontos
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>
<body>
  
  <div id="curve_chart" style="width: 900px; height: 500px; margin: -5px; padding:2px;"></div>
  </body>
