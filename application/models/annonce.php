<?php

class Annonce extends Eloquent{
    
        public function annonces(){
            return $this->belongs_to('user');

        }
}