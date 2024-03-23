<?php
@ob_start();
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){
  
require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['paperpres']);
}


$strSQL = "SELECT * FROM paperpres";
$params = array();


if(isset($_POST['paperpres'])){
  $paperpres = trim($_POST['paperpres']);
  if($paperpres){
  $strSQL .= " WHERE `".$paperpres."` = 'yes'";
  $_SESSION['paperpres'] = $paperpres;
  }
}
else{
  if(isset($_SESSION['paperpres']) && strlen($_SESSION['paperpres'])>0){
    $paperpres = $_SESSION['paperpres'];
    $strSQL .= " WHERE `".$paperpres."` = 'yes'";
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
  <title>Paper Presentation Registrations</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>Paper Presentation</h2>
        <form class="filterForm" method="POST" action="paperpresregistration.php">
          <input type="text" id="paperpres" name="paperpres" autofocus="true" placeholder="Paper Presentation Name (CAPS)" tabindex="0" value="<?= $paperpres ?? '' ?>"/>
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
        echo '<th class="email"><a href="paperpresregistration.php?sort=email">Email</a></th>';
        echo '<th class="fname">Name</th>';
        echo '<th class="mobile">Mobile</th>';
        echo '<th class="event">ARIVARANGAM</th>';
        echo '<th class="event">TECHNOVATION</th>';
        echo '<th class="event">TECH-O-STER</th>';
        echo '<th class="event">AIROS</th>';
        echo '<th class="event">INNOVALANZ</th>';
        echo '</tr>';
        while($row = mysqli_fetch_array($result)){
          //echo '<tr data-ref="' . $row['id'] . '">';
          echo '<tr>';
          // echo '<td>Srishti22' . $row['email'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['fname'] . '</td>';
          echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['ARIVARANGAM'] . '</td>';
            echo '<td>' . $row['TECHNOVATION'] . '</td>';
            echo '<td>' . $row['TECH-O-STER'] . '</td>';
            echo '<td>' . $row['AIROS'] . '</td>';
            echo '<td>' . $row['INNOVALANZ'] . '</td>';
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
      document.getElementById('paperpres').value = '';
    })
    </script>
    <script>
      document.getElementById('downloadexcel').addpaperpresListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#registrations"));
      });
    </script>
</body>
</html>
<?php }else{
      header("location:index.php ");
} ?>