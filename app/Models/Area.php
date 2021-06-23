<?php
/**
 * File name: Country.php
 * Last modified: 2020.04.30 at 08:21:08
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Models;

use Eloquent as Model;

/**
 * Class Country
 * @package App\Models
 * @version October 22, 2019, 2:46 pm UTC
 *
 * @property string name
 * @property string symbol
 * @property string code
 * @property unsignedTinyInteger decimal_digits
 * @property unsignedTinyInteger rounding
 */
class Area extends Model
{

    protected $guarded = [];
    public function state(){
		return $this->hasOne('App\Models\State', 'id' , 'state_id');
	}
}
