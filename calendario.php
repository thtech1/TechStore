<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "TechStore"; 

$conn = new mysqli($servername, $username, $password, $dbname,3307);


if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}


$sql = "SELECT id, nomeEvent, dataEvent, horarioEvent FROM events";
$result = $conn->query($sql);


$events = [];


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $events[] = [
            'id' => $row['id'],
            'title' => $row['nomeEvent'],
            'start' => $row['dataEvent'] . 'T' . $row['horarioEvent'] 
        ];
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="css/calendar.css">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: <?php echo json_encode($events); ?> 
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div class="login-box">
      <a href="cadastroevento.php" class="back-button">Voltar </a>
    </div>
    <div id='calendar'></div>

  </body>
</html>
