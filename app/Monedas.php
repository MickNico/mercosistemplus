<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Monedas extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'monedas';
    
    protected $fillable = [
          'mon_cod',
          'mon_pais',
          'mon_val',
          'mon_fech'
    ];
    
    public static $mon_cod = ["USD (Dolar Americano)" => "USD (Dolar Americano)", "ARS (Peso Argentino)" => "ARS (Peso Argentino)", "BOB (Peso Boliviano)" => "BOB (Peso Boliviano)", "BRL (Real Brasileño)" => "BRL (Real Brasileño)", "CLP (Peso Chileno)" => "CLP (Peso Chileno)", "PEN (nuevo sol Peruano)" => "PEN (nuevo sol Peruano)", "UYU (peso uruguayo)" => "UYU (peso uruguayo)", ];


    public static function boot()
    {
        parent::boot();

        Monedas::observe(new UserActionsObserver);
    }
    
    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMonFechAttribute($input)
    {
        if($input != '') {
            $this->attributes['mon_fech'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['mon_fech'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getMonFechAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}