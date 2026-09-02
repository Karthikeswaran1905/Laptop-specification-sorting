<?php
include "db.php";
$id=$_GET['id']
?? 1;

$sql=
"SELECT *
FROM laptops
WHERE id=$id";

$result=
$conn->query($sql);

$row=
$result
->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>

<title>

Compare

</title>

<style>

body{

font-family:Arial;

padding:40px;

background:#f4f6ff;

}

.card{

background:white;

padding:40px;

border-radius:20px;

max-width:700px;

margin:auto;

}

h1{

color:#3554ff;

}

.spec{

margin:20px 0;

}

button{

padding:15px;

background:#3554ff;

color:white;

border:none;

border-radius:12px;

}

</style>

</head>

<body>

<div class="card">

<h1>

Laptop Details

</h1>

<h2>

<?php

echo
$row['model'];

?>

</h2>

<div class="spec">

RAM:

<?php

echo
$row['ram'];

?>

</div>

<div class="spec">

Storage:

<?php

echo
$row['storage'];

?>

</div>

<div class="spec">

Price:

₹

<?php

echo
$row['price'];

?>

</div>

<button>

Compare

</button>

</div>

</body>

</html>