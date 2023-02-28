<?php

namespace lbs\order\models;

class Commande extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'commande';
    protected $primaryKey = '_id';
    public $timestamps = false;

    public $incrementing = false;
    public $keyType='string';
}
