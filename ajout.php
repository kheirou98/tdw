<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  else{
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  /******************************************************/
  $dbh = new PDO('mysql:host=localhost:3308;dbname=tdw', "root", "");
$formationsQuery = $dbh->query('SELECT * FROM typeFormation');
while ($row = $formationsQuery->fetch()) {
    $formations[] = $row; // Inside while loop
}
$dropDownQuery = $dbh->query('SELECT * FROM formation');
while ($row = $dropDownQuery->fetch()) {
    $drop[$row['typeFormationId']][] = $row;
}
    if(isset($_POST['text'])){
        $text = $_POST['text'];
        $heure = $_POST['heure'];
        $ht = $_POST['ht'];
        $taxe= $_POST['taxe'];
        $q="INSERT INTO typeFormation (nom, volumeHorraire, prixht,taux) VALUES ('$text', '$heure', '$ht', '$taxe')";
        $dbh->query($q);
    }
	}
?>