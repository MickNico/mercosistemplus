<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Especiales extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'especiales';
    
    protected $fillable = [
          'esp_cod',
          'clientes_id',
          'esp_tipo',
          'esp_val'
    ];
    
    public static $esp_tipo = ["Semi Remolque" => "Semi Remolque", "Semi Remolque / 1ra Remonta" => "Semi Remolque / 1ra Remonta", "Semi Remolque / 2da Remonta" => "Semi Remolque / 2da Remonta", "Semi Remolque / 3ra Remonta" => "Semi Remolque / 3ra Remonta", "1ra Remonta" => "1ra Remonta", "2da Remonta" => "2da Remonta", "3ra Remonta" => "3ra Remonta", ];


    public static function boot()
    {
        parent::boot();

        Especiales::observe(new UserActionsObserver);
    }
    
    public function clientes()
    {
        return $this->hasOne('App\Clientes', 'id', 'clientes_id');
    }


    
    
    
}