<?php
@ob_start();
session_start();

// if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){

require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['filter']);
}


$strSQL = "SELECT * FROM members";
$params = array();



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
  <title>General Registrations</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>Participants</h2>
        <div class="d-flex">
        <p>Total Count <?php echo $num_row ?></p>
        <button id="downloadexcel" style="margin-bottom: 20px">Export to Excel</button>
        </div>
    </div>
    <?php
  
      if($num_row > 0){
        echo '<table id="registrations" border=1><thead>';
        echo '<tr>';
        echo '<th class="id"><a href="registrations.php?sort=">id</a></th>';
        echo '<th class="fname"><a href="registrations.php?sort=fname">Name</a></th>';
        echo '<th class="email"><a href="registrations.php?sort=email">Email</a></th>';
        echo '<th class="mobile"><a href="registrations.php?sort=mobile">Mobile</a></th>';
        echo '<th class="event"><a href="registrations.php?sort=events">Events</a></th>';
        echo '<th class="event"><a href="registrations.php?sort=Flagship">Flagship</a></th>';
        echo '</tr></thead>';
        while($row = mysqli_fetch_array($result)){
          echo '<tbody><tr data-ref="' . $row['id'] . '">';
          echo '<td>Atom2k24' . $row['id'] . '</td>';
            echo '<td>' . $row['fname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['mobile'] . '</td>';
            echo '<td>' . $row['events'] . '</td>';
            echo '<td>' . $row['flagship'] . '</td>';
          echo '</tr></tbody>';
        }
        echo '</table>';
      }else{
        echo '<p>No Registrations currently available.</p>';
      }
    ?>
  </main>
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