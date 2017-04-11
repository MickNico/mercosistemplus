<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Modelos extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'modelos';
    
    protected $fillable = [
          'mod_cod',
          'clientes_id',
          'mod_tip_cam',
          'mod_mod',
          'mod_mar',
          'mod_rend',
          'mod_cap_est'
    ];
    

    public static function boot()
    {
        parent::boot();

        Modelos::observe(new UserActionsObserver);
    }
    
    public function clientes()
    {
        return $this->hasOne('App\Clientes', 'id', 'clientes_id');
    }


    
    
    
}