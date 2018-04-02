<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $month = (int)$_POST['month'];
  $year = (int)$_POST['year'];
} else {
  $month = (int)Date('m');
  $year = (int)Date('Y');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="./index.css">
</head>
<body>
  <?php
    $days = array(
      'Sunday',
      'Monday',
      'Tuesday',
      'Wednesday',
      'Thursday',
      'Friday',
      'Saturday'
    );
  ?>
    <form method='POST'>
    <table style='width:900px;' border='1'>
    <thead>
      <tr>
        <th colspan="2"><button id="prevMonth">Prev</button></th>
        <th colspan="3">
          <input id='month' name='month' type='text' style="display: none;" readonly value=<?php echo $month; ?>></input>
          <h3><?php echo Date('F', mktime(0, 0, 0, $month, 1, $year)); ?></h3>
        </th>
        <th colspan="2"><button id="nextMonth">Next</button></th>
      </tr>
      <tr>
        <th colspan="2"><button id="prevYear">Prev</button></th>
        <th colspan="3">
          <input id='year' name='year' style="display: none;" type='text' readonly value=<?php echo $year; ?>></input>
          <h4><?php echo $year ?></h4>
        </th>
        <th colspan="2"><button id="nextYear">Next</button></th>
      </tr>
      <tr>
      <?php 
        foreach ($days as $i) {
          echo "<th><h5>";
          echo $i;
          echo "</h5></th>";
        }
        ?>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
          // get start day, drop it to 0 if it's 7
          $start = (int)Date('N', mktime(0, 0, 0, $month, 1, $year));
          if ($start === 7)
            $start = 0;
          // get the correct length of the selected month in the selectedy year
          $monthLength = Date('t', mktime(0, 0, 0, $month, 1, $year));
          // set calendar size, 42 normally, drops to 35 if appropriate
          $size = 42;
          if ($monthLength + $start <= 35)
            $size = 35;
          // loop 35 or 42 times based on calculated calendar size
          for ($i = 0; $i < $size; $i++) {
            // start a new row every 7 days
            if ($i % 7 === 0 && $i !== 0)
                echo "</tr><tr>";
            // create gray boxes if outside of month's range
            if ($i < $start || $i >= $monthLength + $start)
              echo "<td style='background-color: #bbb;'></td>";
            // place a table cell with day number
            else {
              echo "<td>";
              echo $i + 1 - $start;
              echo "</td>";
            }
          }
          ?>
      </tr>
    </tbody>
  </table>
  </form>
  <script src="./index.js"></script>
</body>
</html>