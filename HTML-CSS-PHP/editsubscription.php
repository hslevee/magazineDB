<?php
require_once "dbconnection.php";
//loading corresponding business data
//the following three lines define and execute the sql statement
$query="SELECT * FROM subscription where subscriptionid = :subscriptionid";
$sql = $pdo->prepare($query);
$sql->execute(array(":subscriptionid" => $_GET['subscriptionid']));

$row = $sql->fetch(PDO::FETCH_ASSOC); //read the next row od the query result into $row
$aen = $row['Subscriptiondate'];
$ean = $row['Subscriptionperiod'];
$kan = $row['Subscriberid'];
$rid = $row['Magazinenid'];

if(isset($_POST['updatebutton'])){
  //execute the following sql statement
  $query="update subscription set subscriptiondate=:subscriptiondate, Subscriptionperiod=:Subscriptionperiod, where subscriptionid=:subscriptionid";
  $sql=$pdo->prepare($query);
  $sql->execute(
  array(":subscriptiondate" => $_POST['subscriptiondate'],
        ":Subscriptionperiod" => $_POST['Subscriptionperiod'],
        ":Magazinenid" => $_POST['Magazinenid'],
        ":subscriptionid" => $_GET['subscriptionid'])
                );
      // end of the execution of the above sql statement
  header('Location: displaysubscription.php'); //go back to display business
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
		Edit a Subscription

	</div>
  <div class="php">
<p>
  <form method="post">
<p>Magazine id:
  <input type="text" name="Magazinenid" value="<?= $kan ?>">
</p>
<p>Subscription date:
  <input type="text" name="subscriptiondate" value="<?= $aen ?>">
</p>
<p>Subscription period:
  <input type="text" name="Subscriptionperiod" value="<?= $ean ?>">
</p>
<p>
  <input type="submit" name="updatebutton" value="update">
</p>
  </form>
</p>
<div class="button">
  <input type="button" class="cancelbutton" value="Cancel" onclick="location.href='displaysubscription.php';">
</div>

</div>
</div>
</body>
</html>
