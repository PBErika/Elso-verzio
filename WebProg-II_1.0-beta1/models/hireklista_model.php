<?php

class Hireklista_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "SELECT h.*, f.csaladi_nev, f.utonev FROM hirek h, felhasznalok f WHERE h.felh_id = f.id ORDER BY h.hir_datum";
			$stmt = $connection->query($sql);
			$hirek = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($hirek) == 0) {
        // Nem sikerült a lekérdezés.
        $retData['eredmeny'] = "ERROR";
        $retData['uzenet'] = '<div><h3>Nincsenek aktuális hírek!</h3></div>';
      } else {
        $uzenet = '';
        foreach ($hirek as $key => $value) {
          $uzenet .= '
<div class="hir-doboz">
  <h3 class="hir-cim">' . $value['hir_cim'] .'</h3>
  <div class="hir-datum-szerzo">' . $value['hir_datum'] . ' - ' . $value['csaladi_nev'] . ' ' . $value['utonev'] . '</div>
  <div class="hir-szoveg-doboz">' . $value['hir_szoveg'] . '</div>
</div>
';
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