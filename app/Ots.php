<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Ots extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'ots';
    
    protected $fillable = [
          'ots_not',
          'ots_hes',
          'clientes_id',
          'ots_ori',
          'ots_des',
          'ots_npe',
          'ots_mod',
          'ots_cha',
          'ots_pat',
          'ots_esp',
          'ots_tip_cam',
          'ots_kms',
          'ots_nota',
          'ots_obs',
          'conductores_id',
          'ots_lic',
          'ots_gui',
          'ots_val_fin',
          'ots_val_rut',
          'ots_val_esp',
          'ots_adic',
          'ots_mon_asig',
          'ots_usr',
          'ots_fact',
          'ots_tip_camb'
    ];
    
    public static $ots_tip_cam = ["Nuevo" => "Nuevo", "Usado" => "Usado"];


    public static function boot()
    {
        parent::boot();

        Ots::observe(new UserActionsObserver);
    }
    
    public function clientes()
    {
        return $this->hasOne('App\Clientes', 'id', 'clientes_id');
    }


    public function conductores()
    {
        return $this->hasOne('App\Conductores', 'id', 'conductores_id');
    }


    
    
    
}