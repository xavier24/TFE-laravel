<?php

class Annonce_Controller extends Base_Controller {

	public function action_index()
	{
            $annonces = Annonce::all();
            Section::inject('title','Car-People');
            return View::make('annonce.index')
                    ->with('annonces',$annonces);
        }

}