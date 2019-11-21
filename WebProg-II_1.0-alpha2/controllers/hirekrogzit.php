<?php

class Hirekrogzit_Controller
{
	public $baseName = 'hirekrogzit';  //meghatározni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router által továbbított paramétereket kapja
	{
		$hirekrogzitModel = new Hirekrogzit_Model;  //az osztályhoz tartozó modell
		// A modellben létrohozzuk a cikket.
		$retData = $hirekrogzitModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "hireklista_hirekfelvisz";
		//betöltjük a nézetet
		$view = new View_Loader($this->baseName.'_main');
		//átadjuk a lekérdezett adatokat a nézetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>