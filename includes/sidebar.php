<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
 
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  

<?php
function getSystemName()
{
    global $conn;

    $systemNameQuery = "SELECT system_name FROM settings";
    $systemNameResult = $conn->query($systemNameQuery);

    if ($systemNameResult->num_rows > 0) {
        $systemNameRow = $systemNameResult->fetch_assoc();
        return $systemNameRow['system_name'];
    } else {
        return;
    }
}

function getLogoUrl()
{
    global $conn;

    $logoQuery = "SELECT logo FROM settings";
    $logoResult = $conn->query($logoQuery);

    if ($logoResult->num_rows > 0) {
        $logoRow = $logoResult->fetch_assoc();
        return $logoRow['logo'];
    } else {
        return 'dist/img/AdminLTELogo.png';
    }
}
?>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="images/adminlogo.png" class="logo" alt="">
        </div>
        <div class="info">
          <a href="login.php" class="d-block">Welcome Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link <?php echo ($current_page == 'dashboard.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="add_members.php" class="nav-link <?php echo ($current_page == 'add_tenant.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Add Tenant</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="manage_tenant.php" class="nav-link <?php echo ($current_page == 'manage_tenant.php' || $current_page == 'edit_tenant.php' || $current_page == 'tenantProfile.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Manage Tenant</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="list_renewal.php" class="nav-link <?php echo ($current_page == 'list_renewal.php' || $current_page == 'renew.php') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-undo"></i>
              <p>Renewal</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="apartment.php" class="nav-link <?php echo ($current_page == 'apartment.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>Apartment</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="payment.php" class="nav-link <?php echo ($current_page == 'payment.php') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-money-check"></i>
              <p>Payment</p>
            </a>
          </li>   
      <li class="nav-item <?php echo ($current_page == 'logout.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>