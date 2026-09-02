<?php
include "db.php";
$sort= $_GET['sort'] ?? 'price';
$category= $_GET['category'] ?? 'all';
$search= $_GET['search'] ?? '';
$sql="SELECT * FROM laptops";
$where=[];
if($search!=""){
$where[]="model LIKE '%$search%'";
}
if($category=="gaming"){
$where[]="price>200000";
}
elseif($category=="multitasking"){
$where[]="ram IN ('32GB','64GB')";
}
elseif($category=="display"){
$where[]="display_size>='16\"'";
}
if(count($where)>0){
$sql.=" WHERE ".implode(" AND ",$where);
}
$sql.=" ORDER BY $sort";
if($category=="top5"){
$sql.=" LIMIT 5";
}
$result=$conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Laptop Comparison</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="hero">
<div class="heroTop">
<h1>Laptop comparison</h1>
<button onclick= "toggleMode()" class="modeBtn">🌙</button>
</div>
</div>
<div class="main">
<div class="sidebar">
<form method="GET">
<h2>SEARCH</h2>
<input type="text" name="search" placeholder= "Search Laptop"
value="<?php echo $search;?>">
<br><br>
<h2>SORT BY</h2>
<select name="sort">
<option value="price">Price</option>
<option value="brand">Brand</option>
</select>
<br><br>
<h2>CATEGORY</h2>
<select name="category">
<option value="all">All</option>
<option value="top5">Top 5</option>
<option value="display">Best Display</option>
<option value="multitasking">Multitasking</option>
<option value="gaming">Gaming</option>
</select>
<br><br>
<button type="submit">Apply</button>
</form>
</div>
<div class="content">
<div class="cards">
<?php
if($result && $result->num_rows>0)
{
while($row=$result->fetch_assoc())
{
?>
<div class="card">
<div class="score">
<?php
echo $row['score'] ?? 95;
?>
</div>
<div class="imgBox">
<img src="<?php echo $row['image']; 
?>">
</div>
<h2>
<?php
echo $row['model'];
?>
</h2>
<div class="rating">⭐
<?php
echo $row['rating']
?? 4.8;
?>
</div>
<div class="price">₹
<?php
echo number_format($row['price']);
?>
</div>
<div class="specs">
<div>
🖥
<?php echo $row['display_size'];
?>
</div>
<div>⚖<?php echo $row['weight'];
?>
</div>
<div>💾<?php echo $row['ram'];
?>
</div>
<div>🗄
<?php echo$row['storage']; 
?>
</div>
</div>
<a class="compare"
href="compare.php?id=<?php echo $row['id'];?>">Compare</a>
</div>
<?php
}
}
else
{
?>
<div class="empty">
<div>💻</div>
<h2>No Laptop Found</h2>
<p>Try changing search or filters</p>
</div>
<?php
}
?>
</div>
</div>
</div>
<script>
function toggleMode(){
document.body.classList.toggle("dark");
}
</script>
</body>
</html>