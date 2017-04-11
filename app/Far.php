<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Far extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'far';
    
    protected $fillable = [
          'ots_id',
          'far_fec',
          'far_ali',
          'far_via',
          'far_die',
          'far_pea',
          'far_loc',
          'far_col',
          'far_otro',
          'far_desc',
          'far_comb_efec',
          'far_comb_cred',
          'far_mon_asig',
          'far_cli_ot'
    ];
    
    public static $far_cli_ot = ["Cliente" => "Cliente", "OT" => "OT"];


    public static function boot()
    {
        parent::boot();

        Far::observe(new UserActionsObserver);
    }
    
    public function ots()
    {
        return $this->hasOne('App\Ots', 'id', 'ots_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setFarFecAttribute($input)
    {
        if($input != '') {
            $this->attributes['far_fec'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['far_fec'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFarFecAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}