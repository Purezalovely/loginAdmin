<?php
require_once 'classes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['TenantID'])) {
    $tenantId = $_GET['TenantID'];

    $checkRenewQuery = "SELECT * FROM renew WHERE TenantID = $tenantId";
    $checkRenewResult = $conn->query($checkRenewQuery);

    if ($checkRenewResult->num_rows > 0) {
        $deleteRenewQuery = "DELETE FROM renew WHERE TenantID = $tenantId";
        if ($conn->query($deleteRenewQuery) === FALSE) {
            echo "Error deleting related renew records: " . $conn->error;
            exit();
        }
    }

    $deletetenantQuery = "DELETE FROM account WHERE TenantID = $tenantId";

    if ($conn->query($deleteMemberQuery) === TRUE) {
        header("Location: manage_members.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: manage_members.php");
    exit();
}

$conn->close();
?>