<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'clientes';
    
    protected $fillable = [
          'cli_cod',
          'cli_rut',
          'cli_dig',
          'cli_nom',
          'cli_dir'
    ];
    

    public static function boot()
    {
        parent::boot();

        Clientes::observe(new UserActionsObserver);
    }
    
    
    
    
}