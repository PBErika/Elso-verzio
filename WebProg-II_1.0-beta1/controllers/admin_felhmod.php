<?php

class Admin_felhmod_Controller
{
	public $baseName = 'admin_felhmod';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		$felhmodModel = new Felhmod_Model;  //az oszt�lyhoz tartoz� modell
		// A modellben �ssze�ll�tjuk a felhaszn�l� list�t.
		$retData = $felhmodModel->get_data($vars);
		//bet�ltj�k a n�zetet
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>