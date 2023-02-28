<?php

namespace lbs\order\services;

use lbs\order\models\Commande;

class CommandeService{
    public static function get(){
        return Commande::all();
    }

    public static function getById($id){
        return Commande::where('id', $id)->get();
    }
}