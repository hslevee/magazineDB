<?php
require_once "dbconnection.php";
$query="SELECT * FROM magazine where magazineid = :magazineid";
$sql = $pdo->prepare($query);
$sql->execute(array(":magazineid" => $_GET['magazineid']));
$row = $sql->fetch(PDO::FETCH_ASSOC);
$bn = $row['Magazineid'];
$c = $row['Magazinename'];
$s = $row['Type'];
$bid = $row['City'];
$fid = $row['State'];

if(isset($_POST['yesbutton'])){
  $query="Delete * from magazine where magazineid=:magazineid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(
        ":magazineid" => $_GET['magazineid'])
                );
  header('Location: displaymagazine.php');
};
?>

<!DOCTYPE html>
<html>
<head>
<title>Subscriptions</title>
<link rel="stylesheet" type="text/css" href="magazinestyle.css">
</head>
<body>
<div class="background">
<div class="fullform">
	<div class="welcometext">
		Delete a Magazine


  <div class="php">
<p>Are you sure you want to delete the following magazine?</p>
<p>
  <form method="post">
<p>Magazined:
  <input type="text" name="Magazineid" value="<?=$bn?>">
</p>
<p>Magazinename:
  <input type="text" name="Magazinename" value="<?= $c ?>">
</p>
<p>Type:
  <input type="text" name="Type" value="<?= $s ?>">
</p>
<p>City:
  <input type="text" name="City" value="<?= $bid ?>">
</p>
<p>State:
  <input type="text" name="State" value="<?= $fid ?>">
</p>
<p>
  <input type="submit" name="yesbutton" value="YES">
</p>
  </form>

</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaymagazine.php';">
</div>

</div>
</div>
</body>
</html>
