<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    public $table = 'anuncios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modelo_id',
        'Name_anuncio',
        'Date_anuncio',
        'Services_anuncio',
        'Schedule_anuncio',
        'Work_days_begining',
        'Work_days_end',
        'Work_hour_begining',
        'Work_hour_end',
        'Rate_anuncio',
        'Places_work_anuncio',
        'Video_anuncio',
        'Pictures_anuncio',
        'Whatsappnumber',
        'Address1_anuncio',
        'Text_anuncio',
        'Price_service_anuncio',
        'Language_anuncio',
        'City_anuncio',
        'Country_anuncio'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'modelo_id' => 'integer',
        'Name_anuncio' => 'string',
        'Date_anuncio' => 'date',
        'Services_anuncio' => 'string',
        'Schedule_anuncio' => 'string',
        'Work_days_begining' => 'string',
        'Work_days_end' => 'string',
        'Work_hour_begining' => 'string',
        'Work_hour_end' => 'string',
        'Rate_anuncio' => 'integer',
        'Places_work_anuncio' => 'string',
        'Pictures_anuncio' => 'string',
        'Video_anuncio' => 'string',
        'Whatsappnumber' => 'integer',
        'Address1_anuncio' => 'string',
        'Text_anuncio' => 'string',
        'Price_service_anuncio' => 'double',
        'Language_anuncio' => 'string',
        'City_anuncio' => 'string',
        'Country_anuncio' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];

    public function modelo() {
		return $this->belongsTo('App\Modelo', 'modelo_id', 'id');
	}

    public function pictures() {
        return $this->hasMany('App\Picture');
    }
}
