<?php

class Annonce_Controller extends Base_Controller {

	public function action_index()
	{
            $titre = "Un super titre";
            $second_titre = "Second titre";
            return View::make('annonce.index')
                    ->with('titre',$titre)
                    ->with('second_titre',$second_titre);
	}

}