<html lang="hu">
<head>
    <title>Széchenyi Fórum Archívuma</title>
    <link rel="stylesheet" href="szechenyi.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<?php
include 'mySQL.php';
?>
<center>
	<form action="#" method="POST">
		<input name="archsrc" id="arch">
		<input id="btn" type="submit" value="Keresés">
	</form>
</center>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$asrc = htmlspecialchars($_POST['archsrc']);
		$DBCon = new DBCon();
		$DBCon -> Kereses($asrc);
	}
?>
</body>
</html>