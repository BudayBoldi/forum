<html>
<head>
	<title>Beilleszt</title>
	<style type="text/css">
		body {
			text-align: center;
			align-content: center;
			background: #f8ad9d
		}
		input {
			font-size: xx-large;
			border: 0;
			border-bottom: 2px solid #333;
			background: transparent;
			outline: none
		}
		input[type=date] {
			width: 180px;
		}
		input[type=submit] {
			font-size: xx-large;
			border: 0;
			border-bottom: 2px solid #333;
			background: transparent
		}
	</style>
</head>
<body>
<form method="POST" action="#">
	<input type="text" name="name" placeholder="Neved" required><br>
	<input type="password" name="passwd" placeholder="Jelszavad" required><br>
	<input type="submit" name="edit" value="Bejelentkez"></h3>
</form>
<?php
include 'mySQL.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$passwd = htmlspecialchars($_POST['passwd']);
	$age = date("Y-m-d H:i:s");
	$DBCon = new DBCon();
	if($DBCon -> WriteTable($name, $passwd, $age)) {
	  header("Location: ./lekerdez.php");
	}
}
?>
</body>
</html>
