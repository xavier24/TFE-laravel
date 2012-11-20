<?php

class Contact_Controller extends Base_Controller {

	function __construct(){
            parent::__construct();
            $this->filter('before', 'csrf')->on('post');
        }
    
        public function action_index(){
            if(Request::method()=='POST'){
                $rules = array(
                    'nom'=>'required',
                    'email'=>'required|email',
                    'message'=>'required'
                );
                $validation = Validator::make(Input::all(),$rules);
                
                if($validation->fails()){
                    return Redirect::to('contact')
                            ->with_errors($validation)
                            ->with_input();
                }
                else{
                    
                }
            }
            Section::inject('title','Contact');
            return View::make('contact.index');
        }
        

}