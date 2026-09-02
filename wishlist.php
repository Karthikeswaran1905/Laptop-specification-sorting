<?php
include "db.php";
$id = $_GET['id'];
$sql = "UPDATE laptops SET wishlist = CASE WHEN wishlist = 1 THEN 0 ELSE 1 END WHERE id = $id";
$conn->query($sql);
header("Location: index.php");
?>