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
    if(isset($_POST['submit'])){
        $text = $_POST['text'];
        $heure = $_POST['heure'];
        $ht = $_POST['ht'];
        $taxe= $_POST['taxe'];
        $q="INSERT INTO typeFormation (nom, volumeHorraire, prixht,taux) VALUES ('$text', '$heure', '$ht', '$taxe')";
        $dbh->query($q);
    }
	if(isset($_POST['submit-type'])){
		$type = $_POST['type1'];
		
		$formationstypeQuery = $dbh->query("SELECT id FROM typeFormation WHERE nom='$type'");
	    $form= $formationstypeQuery->fetch();
	
		$name = $_POST['name'];
		$s="INSERT INTO formation (nom,typeFormationId) VALUES ('$name', '$form[0]')";
        $dbh->query($s);
  }}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<form action="home.php" method="post">
    <h1 align="center">Ajout d'un type d'une formation</h1>
    <hr>
   
	   <div class="input-group">
         <label for="text">Nom de la formation </label>
		 <input type="text" id="text" name="text" required><br>
		</div>
	   <div class="input-group">
         <label for="heure">Volume horraire</label> 
		 <input type="text" id="heure" name="heure"><br>
	   </div>
	   <div class="input-group">
         <label for="ht">Prix HT</label>
		 <input type="text" id="ht" name="ht"><br>		   
	   </div>
	   <div class="input-group">
         <label for="taxe">Taxe</label> 
	   <input type="text" id="taxe" name="taxe"><br>
	    </div>
	   <div class="input-group">
         <input type="submit" name="submit" ></input>
		 </div>
	  
   
    <hr>
</form></br>
<form action="home.php" method="post">
    <h1 align="center">Ajout d'une formation</h1>
    <hr>
   
	   <div class="input-group">
         <label for="text">Nom de la formation </label>
		 <input type="text" id="text" name="name" required><br>
		</div>
	   <div class="input-group">
         <label for="text">INDIQUEZ LE TYPE </label>
		 <input type="text" id="text" name="type1" required><br>
		</div>
	   <div class="input-group">
         <input type="submit" name="submit-type" ></input>
		 </div>
    <hr>
</form>
<div class="sticky">
    <ul>
        <?php foreach ($formations as $row) { ?>
            <li>
                <a>
                    <?php echo $row['nom']; ?>
                </a>
                <?php
                if (isset($drop[$row["id"]])) {
                    echo '<div>';
                    foreach ($drop[$row["id"]] as $row2)
                        echo "<p href=''>" . $row2["nom"] . "</p>";
                    echo '</div>';
                }
                ?>
            </li>
        <?php } ?>

    </ul>
</div>
		<style type="text/css">
		h1{
        background: #4cae4c;
          } 
		  .header {
                font-size: 120%;
                background: #F8F8FF;
                width: 30%;
                margin: 50px auto 0px;
                color: white;
                background: #5F9EA0;
                text-align: center;
                border: 1px solid #B0C4DE;
                border-bottom: none;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
            }
          .input-group {
           margin: 10px 0px 10px 0px;
            }
          .input-group label {
          display: block;
          text-align: left;
          margin: 3px;
          }
          .input-group input {
          height: 30px;
          width: 93%;
          padding: 5px 10px;
          font-size: 16px;
          border-radius: 5px;
          border: 1px solid gray;
          }
         .btn {
           padding: 10px;
           font-size: 15px;
           color: white;
           background: #5F9EA0;
           border: none;
           border-radius: 5px;
         }
        li{
           position: relative;
           list-style-type:none;
           display:block;
           float:left;
           width:18%;
           margin: 10px auto;
           border: 10px solid green;
           background: green;
         }
        li>a {
           color: #FFFFFF;
           text-decoration: none;
           font-size: 20px;
              }
	    form , .content{
           width: 30%;
           margin: 0px auto;
           padding: 20px;
           border: 1px solid #B0C4DE;
           background: white;
           border-radius: 0px 0px 10px 10px;
          }
		</style>
	
</body>
</html>