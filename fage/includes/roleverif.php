<?php
function isadmin(): bool
{
    require "includes/db.php";

    $sql = "SELECT role FROM benevoles WHERE id_benevole = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_SESSION['user_id']]);
    $role = $stmt->fetchColumn();

    return $role == "admin";
}
?>