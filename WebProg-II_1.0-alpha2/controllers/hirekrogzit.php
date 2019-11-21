<?php

class Hirekrogzit_Controller
{
	public $baseName = 'hirekrogzit';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$hirekrogzitModel = new Hirekrogzit_Model;  //az oszt�lyhoz tartoz� modell
		// A modellben l�trohozzuk a cikket.
		$retData = $hirekrogzitModel->get_data($vars);
		if($retData['eredmeny'] == "ERROR")
			$this->baseName = "hireklista_hirekfelvisz";
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>