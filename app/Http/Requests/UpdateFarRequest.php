<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'far_ali' => 'numeric', 
            'far_via' => 'numeric', 
            'far_die' => 'numeric', 
            'far_loc' => 'numeric', 
            'far_col' => 'numeric', 
            'far_otro' => 'numeric', 
            'far_desc' => 'numeric', 
            'far_comb_efec' => 'numeric', 
            'far_comb_cred' => 'numeric', 
            'far_mon_asig' => 'numeric', 
            
		];
	}
}
