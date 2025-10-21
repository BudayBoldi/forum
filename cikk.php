<form class="addcikk" action="#" method="POST">
  <textarea class="cikk" name="tartalom" style="height: 150px; width: 945px" placeholder="Szöveg helye"></textarea>
  <br><br>
  <input type="text" class="cikk" name="neve" placeholder="Cikk neve">
  <input type="text" class="cikk" name="leiras" placeholder="Rövid összegzés">
  <input type="text" class="cikk" name="bkep" placeholder="Borítókép (fájl neve)">
  <input type="text" class="cikk" name="lap" placeholder="Neve röviden">

  <select id="cikks" name="kereses">
    <option value="forum_hirek">Fórum hirek</option>
    <option value="szalap_hirek">Széchenyi Alapitvány hirek</option>
    <option value="gyujto_gondolatok">Gyujtö Gondolatok</option>
    <option value="gyujto_hirek">Gyüjtö hirek</option>
    <option value="sztars_hirek">Széchenyi Társaság hirek</option>
    <option value="sztars_inmemoriam">Széchenyi Társaság InMemoriam</option>
    <option value="oszk_hirek">OSzK hirek</option>
    <option value="oszk_magunkrol">OSzK magunkról</option>
  </select>

  <input id="subbtn" type="submit" value="Beküldés">
</form>

<?php
	include 'mySQL.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_SESSION["LoggedIn"] == "Falucskai Virág") {
			$tartalom = "<p>" . $_POST['tartalom'] . "</p>";
			$neve = htmlspecialchars($_POST['neve']);
			$leiras = htmlspecialchars($_POST['leiras']);
			$bkep = htmlspecialchars($_POST['bkep']);
			$lap = htmlspecialchars($_POST['lap']);
			$kereses = htmlspecialchars($_POST['kereses']);

			$DBCon = new DBCon();
			$DBCon -> WriteKartya(null, $neve, $leiras, $bkep, $lap, $kereses, $tartalom);
		} else {
			echo 'Jelentkezz be!';
		}
	}
?>
