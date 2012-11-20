<?php

class Annonce_Controller extends Base_Controller {

	function __construct(){
            parent::__construct();
            $this->filter('before', 'auth')->only(array('add'));
            $this->filter('before', 'csrf')->on('post');
        }
    
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
        public function action_add(){
            if(Request::method()=='POST'){
                $rules = array(
                    'depart'=>'required|max:50|min:5',
                    'arrivee'=>'required|max:50|min:5'
                );
                $validation = Validator::make(Input::all(),$rules);
                
                if($validation->fails() ){
                    return Redirect::to('annonce/add')
                            ->with_errors($validation)
                            ->with_input();
                }
                else{
                    $post = new Annonce(array(
                        'depart'=>Input::get('depart'),
                        'arrivee'=>Input::get('arrivee'),
                        'description'=>Input::get('description'),
                        'user_id'=>Auth::User()->id
                    ));
                    if($post->save() ){
                        Session::flash('success','Article ajouté');
                        return Redirect::back();
                    }
                }
            }
            Section::inject('title','Car-People - Ajouter une annonce');
            return View::make('annonce.add');
        }

}