<?php
@ob_start();
session_start();

// if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){

require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['flagship']);
}


$strSQL = "SELECT * FROM flagship";
$params = array();


if(isset($_POST['flagship'])){
  $flagship = trim($_POST['flagship']);
  if($flagship){
  $strSQL .= " WHERE `".$flagship."` = 'yes'";
  $_SESSION['flagship'] = $flagship;
  }
}
else{
  if(isset($_SESSION['flagship']) && strlen($_SESSION['flagship'])>0){
    $flagship = $_SESSION['flagship'];
    $strSQL .= " WHERE `".$flagship."` = 'yes'";
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
  <title>Flagship Registrations</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>Flagship</h2>
        <form class="filterForm" method="POST" action="flagshipregistration.php">
          <input type="text" id="flagship" name="flagship" autofocus="true" placeholder="Flagship Event Name (CAPS)" tabindex="0" value="<?= $flagship ?? '' ?>"/>
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
        echo '<th class="email"><a href="flagshipregistration.php?sort=email">Email</a></th>';
        echo '<th class="fname">Name</th>';
        echo '<th class="mobile">Mobile</th>';
        echo '<th class="event">CODE-A-THON</th>';
        echo '<th class="event">AUCTION ARENA</th>';
        echo '<th class="event">INNOVERSE</th>';
        echo '<th class="event">MINDFEST</th>';
        echo '</tr>';
        while($row = mysqli_fetch_array($result)){
          //echo '<tr data-ref="' . $row['id'] . '">';
          echo '<tr>';
          // echo '<td>Srishti22' . $row['email'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['fname'] . '</td>';
          echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['CODE-A-THON'] . '</td>';
            echo '<td>' . $row['AUCTION ARENA'] . '</td>';
            echo '<td>' . $row['INNOVERSE'] . '</td>';
            echo '<td>' . $row['MINDFEST'] . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }else{
        echo '<p>No Registrations currently available.</p>';
      }
    ?>
  </main>
  <script>
    document.getElementById('btnClear').addflagshipListener('click', (ev)=>{
      document.getElementById('flagship').value = '';
    })
    </script>
    <script>
      document.getElementById('downloadexcel').addflagshipListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#registrations"));
      });
    </script>
</body>
</html>
<?php 

// else{
//       header("location:index.php ");
// } 
?>