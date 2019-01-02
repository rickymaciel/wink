<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    public $table = 'modelos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name_model',
        'Age_model',
        'E_mail_model',
        'Whatsappnumber',
        'Whatsappnumber2',
        'Hight_model',
        'Bust_model',
        'Waist_number',
        'Skin_color_model',
        'Address1_model',
        'Address2_model',
        'Language_model',
        'City_model',
        'Country_model'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    protected $casts = [
        'Name_model' => 'string',
        'Age_model' => 'integer',
        'E_mail_model' => 'string',
        'Whatsappnumber' => 'integer',
        'Whatsappnumber2' => 'integer',
        'Hight_model' => 'integer',
        'Bust_model' => 'integer',
        'Waist_number' => 'integer',
        'Skin_color_model' => 'string',
        'Address1_model' => 'string',
        'Address2_model' => 'string',
        'Language_model' => 'string',
        'City_model' => 'string',
        'Country_model' => 'string'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

	public function anuncios() {
		return $this->hasMany('App\Anuncio', 'modelo_id');
	}

}
