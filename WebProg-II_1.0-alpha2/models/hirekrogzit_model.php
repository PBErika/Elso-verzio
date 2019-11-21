<?php

class Hirekrogzit_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "SELECT hir_id, hir_cim FROM hirek WHERE hir_cim='" . $vars['hir_cim'] . "'";
			$stmt = $connection->query($sql);
			$hirek = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if (count($hirek) != 0) {
        $retData['eredmeny'] = "ERROR";
        $retData['uzenet'] = "Ilyen címmel már létezik cikk!";
      } else {
//        $sql = "insert into hirek values (0, :felh_id, :hir_cim, :hir_szoveg, " . time() . ")";
        $sql = "INSERT INTO hirek VALUES (0, :felh_id, :hir_cim, :hir_szoveg, CURRENT_TIMESTAMP)";
        $sth = $connection->prepare($sql);
        if ($sth->execute(Array(':felh_id' => $_SESSION['userid'], ':hir_cim' => $vars['hir_cim'], ':hir_szoveg' => $vars['hir_szoveg'])))
        {
          // Sikerült a létrehozás (insert)
          $retData['eredmeny'] = "OK";
          $retData['uzenet'] = "Sikeres cikk létrehozás!";
        }
        else
        {
          // Nem sikerült a létrehozás
          $retData['eredmeny'] = "ERROR";
          $retData['uzenet'] = "Sikertelen cikk létrehozás!";
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