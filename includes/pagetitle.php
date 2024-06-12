<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <?php
                
                if (strpos($_SERVER['REQUEST_URI'], 'add_tenant.php') !== false) {
                    $pageTitle = 'Add Tenant';
                } 
                  elseif (strpos($_SERVER['REQUEST_URI'], 'renew.php') !== false) {
                    $pageTitle = 'Renew Tenant';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'edit_tenant.php') !== false) {
                  $pageTitle = 'Edit Tenant';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'list_renewal.php') !== false) {
                  $pageTitle = 'Renewal';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'manage_tenant.php') !== false) {
                  $pageTitle = 'Manage Tenant';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'tenantProfile.php') !== false) {
                  $pageTitle = 'Tenant Profile';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'revenue_report.php') !== false) {
                  $pageTitle = 'Revenue Report';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'report.php') !== false) {
                  $pageTitle = 'Membership Report';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'settings.php') !== false) {
                  $pageTitle = 'Settings';
                } elseif (strpos($_SERVER['REQUEST_URI'], 'dashboard.php') !== false) {
                  $pageTitle = 'Dashboard';
                }
                
                echo '<h1 class="m-0 text-dark">' . $pageTitle . '</h1>';
                ?>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $pageTitle; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->