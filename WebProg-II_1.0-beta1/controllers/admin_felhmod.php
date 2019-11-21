<?php

class Admin_felhmod_Controller
{
	public $baseName = 'admin_felhmod';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$felhmodModel = new Felhmod_Model;  //az osztályhoz tartozó modell
		// A modellben összeállítjuk a felhasználó listát.
		$retData = $felhmodModel->get_data($vars);
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>