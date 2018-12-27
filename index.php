<?php include('server.php') ?>
<!DOCTYPE html>
<?php
$dbh = new PDO('mysql:host=localhost:3308;dbname=tdw', "root", "");
$formationsQuery = $dbh->query('SELECT * FROM typeformation');
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
        $query="INSERT INTO typeFormation (nom, volumeHorraire, prixht,taux) VALUES ('$text', '$heure', '$ht', '$taxe')";
        $dbh->query($query);
	}
		

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet"  href="style.css">
    <title>Madrassati</title>
</head>
<body>
<h1 align="center">Ecole privée
    <bdi>المدرسة الخاصة</bdi>
</h1>
<div class="slideShow">
    <img src="ress/back.jpg" class="img1" alt="BackgroundImg" width="100%" height="100%">
    <img src="ress/diapo2.jpg" alt="BackgroundImg" width="100%" height="100%">
    <img src="ress/diapo3.jpg" alt="BackgroundImg" width="100%" height="100%">
    <img src="ress/diapo4.jpg" alt="BackgroundImg" width="100%" height="100%">
</div>


<h2 align="center">Formations</h2>
<div>
    <ul>
        <?php foreach ($formations as $row) { ?>
            <li class="dropdown">
                <a class="formations lien" href="">
                    <?php echo $row['nom']; ?>
                </a>
                <?php
                if (isset($drop[$row["id"]])) {
                    echo '<div class="dropdown-content">';
                    foreach ($drop[$row["id"]] as $row2)
                        echo "<p href=''>" . $row2["nom"] . "</p>";
                    echo '</div>';
                }
                ?>
            </li>
        <?php } ?>

    </ul>
</div>
<div align="center">
    <video align="center" class="video" src="ress/Video%20accueil.mp4" controls></video>	
</div>
   <div class="header">
  	  <h3>Register</h3>
   </div>
<form method="post" action="index.php">
  <?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
	    <p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  
  	</div>
	
</body>
<meta http-equiv="pragma" content="no-cache"/>
</html>
<script src="Libraries/JS/jquery.min.js"></script>
<script src="Controllers/exo2.js"></script>
<script src="Controllers/ajax.js"></script>
<script>
    $("#add").click(function (e) {

        var name = $("#text").val();
        var heure = $("#heure").val();
        var ht = parseInt($("#ht").val());
        var taxe = parseInt($("#taxe").val());

        str = "";
        str +=
            "<tr><td>" + name + "</td>" +
            "<td>" + heure + "</td>" +
            "<td>" + ht + "</td>" +
            "<td>" + taxe + "</td>" +
            "<td>" + (ht + ht * taxe / 100) + "</td>" +
            "</tr>";
        $("#formationsBody").html($("#formationsBody").html() + str);
    });
</script>

