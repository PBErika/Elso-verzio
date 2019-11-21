<?php

class Felhmod_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "SELECT id, csaladi_nev, utonev, bejelentkezes, jogosultsag FROM felhasznalok ORDER BY csaladi_nev";
			$stmt = $connection->query($sql);
			$felhasznalok = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($felhasznalok) == 0) {
        // Nem sikerült a lekérdezés.
        $retData['eredmeny'] = "ERROR";
        $retData['uzenet'] = "<li></li>";
        $retData['uzenet'] = '<tr><td colspan="4">Nincsenek regisztrált felhasználók!</td></tr>';
      } else {
        $uzenet = '';
        foreach ($felhasznalok as $key => $value) {
          $uzenet .= '
      <tr><td>' . $value['id'] . '</td><td>' . $value['csaladi_nev'] . ' ' . $value['utonev'] . '</td><td>' . $value['bejelentkezes'] . '</td><td>' . $value['jogosultsag'] . '</td><td>módosítás - törlés</td></tr>';
        }
        // Sikerült a lekérdezés.
        $retData['eredmeny'] = "OK";
        $retData['uzenet'] = $uzenet;
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