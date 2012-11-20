<?php

class User_Controller extends Base_Controller {

	function __construct(){
            parent::__construct();
            $this->filter('before', 'auth')->only(array('index','logOut'));
            $this->filter('before', 'csrf')->on('post');
        }
        
        
        public function action_index(){
            'Bienvenue '.Auth::user()->username;
        }
        public function action_login(){
            
        }
        public function action_signup(){
           if( Auth::check() ){
               return Redirect::to('user');
           }
           if(Request::method()=='POST'){
               $rules = array(
                   'username'=>'required|unique:users|between:3,20',
                   'email'=>'required|email|unique:users',
                   'password'=>'required|min:5|confirmed',
                   'password_confirmation'=>'required'
               );
               $validation = Validator::make(Input::all(),$rules );
               if($validation->fails()){
                   return Redirect::to('user/signup')
                           ->with_errors($validation)
                           ->with_input();
               }
           }
           
           Section::inject('title','Inscription');
           return View::make('user.signup');
        }
        public function action_logout(){
           
        }

}