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
           if( Auth::check() ){
               return Redirect::to('user');
           }
           if(Request::method()=='POST'){
               $userdata = array(
                   'username'=>Input::get('username'),
                   'password'=>Input::get('password')
               );
               if(Auth::attempt($userdata)){
                   return Redirect::to('user');
               }
               else{
                   return Redirect::to('user/login')
                           ->with_input()
                           ->with('login_errors',true);
               }
           }
           Section::inject('title','Connexion');
           return View::make('user.login');
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
               else{
                   $data = array(
                       'username'=>Input::get('username'),
                       'email'=>Input::get('email'),
                       'password'=>Hash::make( Input::get('password') )
                   );
                   if(User::create($data)){
                       Session::flash('success','Inscription terminée');
                   }
               }
               return Redirect::to('user/signup');
           }
           
           Section::inject('title','Inscription');
           return View::make('user.signup');
        }
        public function action_logout(){
           
        }

}