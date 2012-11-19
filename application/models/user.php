<?php

class User extends Eloquent{
    
        public function annonces(){
            return $this->has_many('annonce');

        }
}