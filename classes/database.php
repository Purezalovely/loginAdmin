<?php
class database {
    private $conn;

    function __construct() {
        $this->conn = new PDO('mysql:host=localhost;dbname=apartment','root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getConnection() {
        return $this->conn;
    }
}


  function checkAccount($account) {
    $con = $this->opencon();
    $stmt = $con->prepare("SELECT * FROM apartment WHERE account = ?");
    $stmt->execute([$account]);
    return $stmt->fetch();
  }

  function checkAdmin($admin) {
    $con = $this->opencon();
    $stmt = $con->prepare("SELECT * FROM apartment WHERE admins = ?");
    $stmt->execute([$admin]);
    return $stmt->fetch();
  }

  function addApartment($account, $admins, $maintenance, $payment, $rent, $unit) {
    $con = $this->opencon();
    $stmt = $con->prepare("INSERT INTO apartment (account, admins, maintenance, payment, rent, unit) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$account, $admins, $maintenance, $payment, $rent, $unit]);
    return $con->lastInsertId();
  }

  function updateApartment($id, $account, $admins, $maintenance, $payment, $rent, $unit) {
    $con = $this->opencon();
    $stmt = $con->prepare("UPDATE apartment SET account = ?, admins = ?, maintenance = ?, payment = ?, rent = ?, unit = ? WHERE id = ?");
    $stmt->execute([$account, $admins, $maintenance, $payment, $rent, $unit, $id]);
    return true;
  }

  function deleteaccount($id) {
    $con = $this->opencon();
    $stmt = $con->prepare("DELETE FROM apartment WHERE TenantID = ?");
    $stmt->execute([$id]);
    return true;
  }

  function viewaccount() {
    $con = $this->opencon();
    $stmt = $con->prepare("SELECT * FROM apartment");
    $stmt->execute();
    return $stmt->fetchAll();
  }
