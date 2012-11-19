<?php

class Annonce_Controller extends Base_Controller {

	public function action_index()
	{
            $annonces = Annonce::all();
            return View::make('annonce.index')
                    ->with('annonces',$annonces);
        }

}