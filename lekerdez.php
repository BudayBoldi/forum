<html>
<head>
	<title>Lekerdezes</title>
	<style type="text/css">
		body {
			text-align: center;
			align-content: center;
			background: wheat
		}
		.txt {
			font-size: xx-large;
			border: 0;
			border-bottom: 2px solid #333;
			background: transparent;
			outline: none
		}
		a, #sub {
			color: black;
			text-decoration: none;
			font-size: x-large;
			border: 0;
			border-bottom: 2px solid #333;
			background: transparent
		}
		res {
			font-weight: bold;
		}
	</style>
</head>
<body>
<form method="POST" action="#">
	<input type="text" class="txt" name="name" placeholder="Neved"><br>
	<input type="password" class="txt" name="passwd" placeholder="Jelszavad"><br>
	<input type="submit" ID="sub" value="Belépés">&nbsp;&nbsp;<a href="./beilleszt.php">Regisztrálás</a>
</form>
<?php
include 'mySQL.php';
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $passwd = htmlspecialchars($_POST['passwd']);
  $DBCon = new DBCon();
  if($DBCon -> GetTable($name, $passwd)) {
  	header("Location: ./index.php");
  }
}
?>
</body>
</html>
