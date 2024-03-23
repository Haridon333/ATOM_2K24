<?php
@ob_start();
session_start();
// if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){

require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['filter']);
  unset($_SESSION['workshop']);
}


$strSQL = "SELECT * FROM workshops";
$params = array();


if(isset($_POST['filter']) && isset($_POST['workshop'])){
  $workshop = trim($_POST['workshop']);
  $filter = trim($_POST['filter']);
  if($filter && $workshop){
  if($filter == "all"){
    $strSQL .= " WHERE `".$workshop."` = 'yes' OR `".$workshop."` = 'paid'";
  }else{
  $strSQL .= " WHERE `".$workshop."` = '".$filter."'";
  }
  // echo $strSQL;
  //$params[] = '%' . $filter . '%';
  $_SESSION['workshop'] = $workshop;
  $_SESSION['filter'] = $filter;
  }
}
else{
  if(isset($_SESSION['filter']) && strlen($_SESSION['filter'])>0 && isset($_SESSION['workshop']) ){
    $workshop = $_SESSION['workshop'];
    $filter = $_SESSION['filter'];
    $strSQL .= " WHERE `".$workshop."` = '".$filter."'";
    //$params[] = '%' . $filter . '%';
  }
}


if(isset($_GET['sort']) && strlen(trim($_GET['sort'])) > 0){
  $sort = addslashes(trim($_GET['sort']));
  
  $strSQL .= " ORDER BY $sort";
} 

$result = mysqli_query($conn, $strSQL) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Workshop Registrations</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>Workshops</h2>
        <form class="filterForm" method="POST" action="workshopregistration.php">
          <input type="text" id="workshop" name="workshop" autofocus="true" placeholder="Workshop Name (CAPS)" tabindex="0" value="<?= $workshop ?? '' ?>"/>
          <input type="text" id="filter" name="filter" autofocus="true" placeholder="Type yes or paid or all" tabindex="0" value="<?= $filter ?? '' ?>"/>
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
        echo '<th class="email"><a href="workshopregistration.php?sort=email">Email</a></th>';
        echo '<th class="fname">Name</th>';
        echo '<th class="mobile">Mobile</th>';
        echo '<th class="workshop">CLOUD COMPUTING</th>';
        echo '<th class="workshop">SMART ROVER USING IOT</th>';
        echo '<th class="workshop">MISSING PIECES OF BUSINESS SAGA</th>';
        
        echo '</tr>';
        while($row = mysqli_fetch_array($result)){
          //echo '<tr data-ref="' . $row['id'] . '">';
          echo '<tr>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['fname'] . '</td>';
          echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['CLOUD COMPUTING'] . '</td>';
            echo '<td>' . $row['SMART ROVER USING IOT'] . '</td>';
            echo '<td>' . $row['MISSING PIECES OF BUSINESS SAGA'] . '</td>';
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
      document.getElementById('filter').value = '';
      document.getElementById('workshop').value = '';
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