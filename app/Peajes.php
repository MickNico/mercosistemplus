<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Peajes extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'peajes';
    
    protected $fillable = [
          'pea_pais',
          'pea_ori',
          'pea_des',
          'pea_cant_eje',
          'pea_val'
    ];
    
    public static $pea_cant_eje = ["1 Eje" => "1 Eje", "2 Eje" => "2 Eje", "3 Eje" => "3 Eje", "4 Eje" => "4 Eje", "5 Eje" => "5 Eje", "6 Eje" => "6 Eje", "7 Eje" => "7 Eje", "8 Eje" => "8 Eje", "9 Eje" => "9 Eje", "10 Eje" => "10 Eje", ];


    public static function boot()
    {
        parent::boot();

        Peajes::observe(new UserActionsObserver);
    }
    
    
    
    
}