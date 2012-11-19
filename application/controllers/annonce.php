<?php

class Annonce_Controller extends Base_Controller {

	public function action_index()
	{
		return View::make('annonce.index');
	}

}