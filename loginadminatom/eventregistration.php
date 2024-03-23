<?php
@ob_start();
session_start();

// if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){

require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['event']);
}


$strSQL = "SELECT * FROM events";
$params = array();


if(isset($_POST['event'])){
  $event = trim($_POST['event']);
  if($event){
  $strSQL .= " WHERE `".$event."` = 'yes'";
  $_SESSION['event'] = $event;
  }
}
else{
  if(isset($_SESSION['event']) && strlen($_SESSION['event'])>0){
    $event = $_SESSION['event'];
    $strSQL .= " WHERE `".$event."` = 'yes'";
    //$params[] = '%' . $filter . '%';
  }
}


if(isset($_GET['sort']) && strlen(trim($_GET['sort'])) > 0){
  $sort = addslashes(trim($_GET['sort']));
  
  $strSQL .= " ORDER BY $sort";
} 

$result = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Registrations</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>Events</h2>
        <form class="filterForm" method="POST" action="eventregistration.php">
          <input type="text" id="event" name="event" autofocus="true" placeholder="Event Name (CAPS)" tabindex="0" value="<?= $event ?? '' ?>"/>
          <input type="submit" name="btnFilter" id="btnFilter" value="Go"/>
          <input type="submit" name="btnClear" id="btnClear" value="Clear Filters"/>
        </form>
        <div>
          <p>Total Count <?php echo $num_row ?></p>
          <button id="downloadexcel" style="margin-bottom: 20px">Export to Excel</button>
        </div>
    </div>
    <?php
  
      if($num_row > 0){
        echo '<table id="registrations" border=1>';
        echo '<tr>';
        echo '<th class="email"><a href="eventregistration.php?sort=email">Email</a></th>';
        echo '<th class="fname">Name</th>';
        echo '<th class="mobile">Mobile</th>';
        echo '<th class="event">WORDSWITS</th>';
        echo '<th class="event">QUESTODESSEY</th>';
        echo '<th class="event">TECHNO-CALYPSE</th>';
        echo '<th class="event">TECHFORGE</th>';
        echo '<th class="event">VOLTVENTURE</th>';
        echo '<th class="event">NEXUS</th>';
        echo '<th class="event">TECHTREK</th>';
        echo '<th class="event">BLISSBASH</th>';
        echo '<th class="event">DICE DOMINION</th>';
        echo '<th class="event">SYNERGY</th>';
        echo '<th class="event">SIGHT ON SITE</th>';
        echo '<th class="event">THE LOST ARCHIVES</th>';
        echo '<th class="event">DEADLY PURSUIT</th>';
        echo '</tr>';
        while($row = mysqli_fetch_array($result)){
          //echo '<tr data-ref="' . $row['id'] . '">';
          echo '<tr>';
          // echo '<td>Srishti22' . $row['email'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['fname'] . '</td>';
          echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['WORDSWITS'] . '</td>';
            echo '<td>' . $row['QUESTODESSEY'] . '</td>';
            echo '<td>' . $row['TECHNO-CALYPSE'] . '</td>';
            echo '<td>' . $row['TECHFORGE'] . '</td>';
            echo '<td>' . $row['VOLTVENTURE'] . '</td>';
            echo '<td>' . $row['NEXUS'] . '</td>';
            echo '<td>' . $row['TECHTREK'] . '</td>';
            echo '<td>' . $row['BLISSBASH'] . '</td>';
            echo '<td>' . $row['DICE DOMINION'] . '</td>';
            echo '<td>' . $row['SYNERGY'] . '</td>';
            echo '<td>' . $row['SIGHT ON SITE'] . '</td>';
            echo '<td>' . $row['THE LOST ARCHIVES'] . '</td>';
            echo '<td>' . $row['DEADLY PURSUIT'] . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }else{
        echo '<p>No Registrations currently available.</p>';
      }
    ?>
  </main>
  <script>
    document.getElementById('btnClear').addEventListener('click', (ev)=>{
      document.getElementById('event').value = '';
    })
    </script>
    <script>
      document.getElementById('downloadexcel').addEventListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#registrations"));
      });
    </script>
</body>
</html>

<?php 
// }else{
//       header("location:index.php ");
// }
 ?>