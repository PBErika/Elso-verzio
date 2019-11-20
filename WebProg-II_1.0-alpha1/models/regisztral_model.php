<?php

class Regisztral_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
//			$sql = "select id, csaladi_nev, utonev, jogosultsag from felhasznalok where bejelentkezes='".$vars['login']."' and jelszo='".sha1($vars['password'])."'";
			$sql = "select id, bejelentkezes from felhasznalok where bejelentkezes='" . $vars['login'] . "'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($felhasznalo) != 0) {
				$retData['eredmeny'] = "ERROR";
				$retData['uzenet'] = "Ilyen felhasználónévmár létezik, válaszzon másikat!";
      } else {
        $sql = "insert into felhasznalok values (0, :csaladi_nev, :utonev, :login, sha1(:jelszo))";
        $sth = $connection->prepare($sql);
        if ($sth->execute(Array(':csaladi_nev' => $vars['csaladi_nev'], ':utonev' => $vars['utonev'], ':login' => $vars['login'], ':jelszo' => $_POST['password'])))
        {
          // Sikerült a létrehozás (insert)
 //         $regisztracio_eredmeny = true;
          $retData['eredmeny'] = "OK";
          $retData['uzenet'] = "Sikeresen regisztrált!";
        }
        else
        {
          // Nem sikerült a létrehozás
 //         $regisztracio_eredmeny = false;
          $retData['eredmeny'] = "ERROR";
          $retData['uzenet'] = "Sikertelen regisztráció!";
        } // if ()
      } // if ()
/*
			switch(count($felhasznalo)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					break;
				case 1:
					$retData['eredmény'] = "OK";
					$retData['uzenet'] = "Kedves ".$felhasznalo[0]['csaladi_nev']." ".$felhasznalo[0]['utonev']."!<br><br>
					                      Jó munkát kívánunk rendszerünkkel.<br><br>
										  Az üzemeltetők";
					$_SESSION['userid'] =  $felhasznalo[0]['id'];
					$_SESSION['userlastname'] =  $felhasznalo[0]['csaladi_nev'];
					$_SESSION['userfirstname'] =  $felhasznalo[0]['utonev'];
					$_SESSION['userlevel'] = $felhasznalo[0]['jogosultsag'];
					Menu::setMenu();
					break;
				default:
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói név -jelszó párral!";
			}
*/

		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>