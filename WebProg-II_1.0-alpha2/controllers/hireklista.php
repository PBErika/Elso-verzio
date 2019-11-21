<?php

class Hireklista_Controller
{
	public $baseName = 'hireklista';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$hireklistaModel = new Hireklista_Model;  //az oszt�lyhoz tartoz� modell
		// A modellben �ssze�ll�tjuk a h�r list�t.
		$retData = $hireklistaModel->get_data($vars);
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>