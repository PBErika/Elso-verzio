<?php

class Regisztral_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "select id, bejelentkezes from felhasznalok where bejelentkezes='" . $vars['login'] . "'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($felhasznalo) != 0) {
				$retData['eredmeny'] = "ERROR";
				$retData['uzenet'] = "Ilyen felhasználónévmár létezik, válaszzon másikat!";
      } else {
        $sql = "insert into felhasznalok values (0, :csaladi_nev, :utonev, :bejelentkezes, sha1(:jelszo), '_1_')";
        $sth = $connection->prepare($sql);
        if ($sth->execute(Array(':csaladi_nev' => $vars['csaladi_nev'], ':utonev' => $vars['utonev'], ':bejelentkezes' => $vars['login'], ':jelszo' => $_POST['password'])))
        {
          // Sikerült a létrehozás (insert)
          $retData['eredmeny'] = "OK";
          $retData['uzenet'] = "Sikeresen regisztrált!";
        }
        else
        {
          // Nem sikerült a létrehozás
          $retData['eredmeny'] = "ERROR";
          $retData['uzenet'] = "Sikertelen regisztráció!";
        } // if ()
      } // if ()
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>