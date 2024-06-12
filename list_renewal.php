<?php
require_once('classes/database.php');

$selectQuery = "SELECT * FROM account";
$result = $conn->query($selectQuery);

if (!isset($_SESSION['TenantID'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<?php
require_once('classes/database.php');?>


<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include('includes/nav.php');?>

 <?php include('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  <?php include('includes/pagetitle.php');?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <!-- Visit codeastro.com for more projects -->
        <div class="row">
        
        <div class="col-12">

        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Tenants Data Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Fullname</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                $expiryDate = strtotime($row['expiry_date']);
                $currentDate = time();
                $daysDifference = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

                $expiryDate = strtotime($row['expiry_date']);
                $daysRemaining = floor(($expiryDate - $currentDate) / (60 * 60 * 24));

                echo "<tr>";
                echo "<td>{$row['fullname']}</td>";
                echo "<td>{$row['contact_number']}</td>";
                echo "<td>{$row['email']}</td>";
                if ($row['expiry_date'] === NULL) {
                  echo "<td>NONE</td>";
              } else {
                  $expiryDate = new DateTime($row['expiry_date']);
                  $currentDate = new DateTime();
              
                  $daysRemaining = $currentDate->diff($expiryDate)->days;

              
                  echo "<td>{$row['expiry_date']}<br><small>{$daysRemaining} days remaining</small></td>";
              }                echo "<td><span class='badge $badgeClass'>$membershipStatus</span></td>";


                echo "<td>
                <a href='renew.php?id={$row['TenantID']}' class='btn btn-success'>Renew</a>
                    </td>";
                echo "</tr>";

                $counter++;
            }
            ?>
        </tbody>
    </table>
</div>
 </div>
 </div>
</div>
</div>
    </section>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
   
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>