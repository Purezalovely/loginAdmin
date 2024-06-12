<?php
require_once 'classes/database.php';

$db = new database();
$conn = $db->getConnection();

// Now you can use the $conn object
$query = $conn->prepare("SELECT * FROM apartment");
$query->execute();
$result = $query->fetchAll();

// Get total number of apartments
$totalApartmentsQuery = "SELECT COUNT(*) as total_apartments FROM apartments";
$totalApartmentsResult = $db->conn->query($totalApartmentsQuery);
$totalApartments = $totalApartmentsResult->fetch_assoc()['total_apartments'];



// Get total number of apartments
$totalApartmentsQuery = "SELECT COUNT(*) as total_apartments FROM apartments";
$totalApartmentsResult = $conn->query($totalApartmentsQuery);
$totalApartments = $totalApartmentsResult->fetch_assoc()['total_apartments'];

// Get total number of residents
$totalaccountQuery = "SELECT COUNT(*) as total_account FROM account";
$totalaccountResult = $conn->query($totalaccountQuery);
$totalaccount = $totalaccountResult->fetch_assoc()['total_account'];

// Get total number of maintenance requests
$totalMaintenanceRequestsQuery = "SELECT COUNT(*) as total_maintenance_requests FROM maintenance_requests";
$totalMaintenanceRequestsResult = $conn->query($totalMaintenanceRequestsQuery);
$totalMaintenanceRequests = $totalMaintenanceRequestsResult->fetch_assoc()['total_maintenance_requests'];

// Get total number of payments due
$totalPaymentsDueQuery = "SELECT COUNT(*) as total_payments_due FROM payments WHERE payment_status = 'due'";
$totalPaymentsDueResult = $conn->query($totalPaymentsDueQuery);
$totalPaymentsDue = $totalPaymentsDueResult->fetch_assoc()['total_payments_due'];

// Get latest 5 maintenance requests
$latestMaintenanceRequestsQuery = "SELECT * FROM maintenance_requests ORDER BY request_date DESC LIMIT 5";
$latestMaintenanceRequestsResult = $conn->query($latestMaintenanceRequestsQuery);
$latestMaintenanceRequests = $latestMaintenanceRequestsResult->fetch_all(MYSQLI_ASSOC);

// Get latest 5 payments
$latestPaymentsQuery = "SELECT * FROM payments ORDER BY payment_date DESC LIMIT 5";
$latestPaymentsResult = $conn->query($latestPaymentsQuery);
$latestPayments = $latestPaymentsResult->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>

<div class="dashboard">
  <h1>Welcome<?php echo $apartment; ?> Admin</h1>
  <div class="stats">
    <div class="stat">
      <h2>Total Apartments: <?php echo $totalApartments; ?></h2>
    </div>
    <div class="stat">
      <h2>Total Residents: <?php echo $totalResidents; ?></h2>
    </div>
    <div class="stat">
      <h2>Total Maintenance Requests: <?php echo $totalMaintenanceRequests; ?></h2>
    </div>
    <div class="stat">
      <h2>Total Payments Due: <?php echo $totalPaymentsDue; ?></h2>
    </div>
  </div>
  <div class="latest-requests">
    <h2>Latest Maintenance Requests</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Apartment</th>
        <th>Description</th>
      </tr>
      <?php foreach ($latestMaintenanceRequests as $request) { ?>
      <tr>
        <td><?php echo $request['request_date']; ?></td>
        <td><?php echo $request['apartment_number']; ?></td>
        <td><?php echo $request['description']; ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <div class="latest-payments">
    <h2>Latest Payments</h2>
    <table>
      <tr>
        <th>Date</th>
        <th>Apartment</th>
        <th>Amount</th>
      </tr>
      <?php foreach ($latestPayments as $payment) { ?>
      <tr>
        <td><?php echo $payment['payment_date']; ?></td>
        <td><?php echo $payment['apartment_number']; ?></td>
        <td><?php echo $payment['amount']; ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</div>

<style>
  .dashboard {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .stats {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }
  .stat {
    width: 23%;
    margin: 10px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .latest-requests, .latest-payments {
    margin-top: 20px;  
  }
  </style>
</body>
</html>