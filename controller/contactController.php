<?php

require_once('model/contactModel.php');

class contactController {

	public function __construct()
    {
        $this->contactModel = new contactModel();
    }

	public function makeContactForm()
	{
		$result = $this->contactModel->contact();
		return $result;
	}

	public function collectContact()
	{
		if(isset($_REQUEST['contact']))
		{
			$contact = $this->contactModel->contact();
		}
	}
}