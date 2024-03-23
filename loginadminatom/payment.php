<?php
@ob_start();
session_start();

// if(isset($_SESSION['admin']) && $_SESSION['admin']=="atom23@psg"){


require_once('../includes/dbh.inc.php');


if(isset($_POST['btnClear'])){
  unset($_SESSION['filter']);
}


$strSQL = "SELECT * FROM payment";
$params = array();


if(isset($_POST['filter'])){
  
  $filter = trim($_POST['filter']);
  if($filter){
  $strSQL .= " WHERE payment_status = '".$filter."'";
  $params[] = '%' . $filter . '%';
  $_SESSION['filter'] = $filter;
  }
}else{
  if(isset($_SESSION['filter']) && strlen($_SESSION['filter'])>0 ){
  
    $filter = $_SESSION['filter'];
    $strSQL .= " WHERE payment_status = '".$filter."'";
    $params[] = '%' . $filter . '%';
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
  <title>PAYMENTS</title>
  <script src="../assets/js/table2excel.js"></script>
  
</head>
<body class="<?= $sort ?? '' ?>">
  <main>
    <div class="heading">
      <h2>PAYMENTS</h2>
        <form class="filterForm" method="POST" action="payment.php">
          <input type="text" id="filter" name="filter" autofocus="true" placeholder="Type created or success" tabindex="0" value="<?= $filter ?? '' ?>"/>
          <input type="submit" name="btnFilter" id="btnFilter" value="Go"/>
          <input type="submit" name="btnClear" id="btnClear" value="Clear Filters"/>
        </form>
        <div class="d-flex">
        <p>Total Count <?php echo $num_row ?></p>
        <button id="downloadexcel" style="margin-bottom: 20px">Export to Excel</button>
        </div>
    </div>
    <?php
  
      if($num_row > 0){
        echo '<table id="payments" border=1><thead>';
        echo '<tr>';
        echo '<th class="id"><a href="payment.php?sort=">id</a></th>';
        echo '<th class="fname"><a href="payment.php?sort=name">Name</a></th>';
        echo '<th class="amount"><a href="payment.php?sort=amount">Amount</a></th>';
        echo '<th class="transaction_id"><a href="payment.php?sort=transaction_id">Transaction ID</a></th>';
        echo '<th class="payment_status"><a href="payment.php?sort=payment_status">Payment Status</a></th>';
        echo '<th class="time"><a href="payment.php?sort=added_on">Created on</a></th>';
        echo '</tr></thead>';
        while($row = mysqli_fetch_array($result)){
          echo '<tbody><tr data-ref="' . $row['id'] . '">';
          echo '<td>ATOM23' . $row['id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['amount'] . '</td>';
            echo '<td>' . $row['transaction_id'] . '</td>';
            echo '<td>' . $row['payment_status'] . '</td>';
            echo '<td>' . $row['added_on'] . '</td>';
          echo '</tr></tbody>';
        }
        echo '</table>';
      }else{
        echo '<p>No Payments currently available.</p>';
      }
    ?>
  </main>
  <script>
    document.getElementById('btnClear').addEventListener('click', (ev)=>{
      document.getElementById('filter').value = '';
    })
    </script>
    <script>
      document.getElementById('downloadexcel').addEventListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#payments"));
      });
    </script>
</body>
</html>
<?php
//  }else{
//       header("location:index.php ");
// } 
?>