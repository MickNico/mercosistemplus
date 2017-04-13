<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Rutas extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'rutas';
    
    protected $fillable = [
          'rut_cod',
          'clientes_id',
          'rut_ori',
          'rut_des',
          'rut_kms',
          'rut_val',
          'monedas_id',
          'rut_tip_camb',
          'Local, Provincia, Internacional',
          'rut_val_a_cond'
    ];
    
    public static $Local , Provincia, Internacional = ["" => ""];


    public static function boot()
    {
        parent::boot();

        Rutas::observe(new UserActionsObserver);
    }
    
    public function clientes()
    {
        return $this->hasOne('App\Clientes', 'id', 'clientes_id');
    }


    public function monedas()
    {
        return $this->hasOne('App\Monedas', 'id', 'monedas_id');
    }


    
    
    
}