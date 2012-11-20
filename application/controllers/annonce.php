<?php

class Annonce_Controller extends Base_Controller {

	public function action_index(){
            $annonces = Annonce::all();
            Section::inject('title','Car-People');
            return View::make('annonce.index')
                    ->with('annonces',$annonces);
        }
        public function action_lire($slug,$id){
           $annonce = Annonce::find($id);
           Section::inject('title','Car-People - Voyagez de '.$annonce->depart.' à '.$annonce->arrivee.' avec '.$annonce->user->username);
           return View::make('annonce.lire')
                    ->with('annonce',$annonce);
        }
        public function action_user($slug,$id){
           $user = User::find($id);
           Section::inject('title','Car-People - Profil de '.$user->username);
           return View::make('annonce.user')
                    ->with('user',$user);
        }

}