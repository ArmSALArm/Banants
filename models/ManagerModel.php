<?php
restrictAccess();

/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/27/2015
 * Time: 12:06 PM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class ManagerModel extends Eloquent
{
    public $timestamps = false;

    protected $table = 'managers';

    protected $fillable = ['first_name_id', 'last_name_id', 'team_id', 'country_id', 'position_id', 'photo_id', 'status', 'slug'];


    public function firstName()
    {
        return $this->belongsTo('EntityModel', 'first_name_id')->first()->text;
    }

    public function lastName()
    {
        return $this->belongsTo('EntityModel', 'last_name_id')->first()->text;
    }

    public function firstNameModel()
    {
        return $this->belongsTo('EntityModel', 'first_name_id');
    }

    public function lastNameModel()
    {
        return $this->belongsTo('EntityModel', 'last_name_id');
    }

    public function country()
    {
        return $this->belongsTo('CountryModel', 'country_id')->first();
    }

    public function position()
    {
        return $this->belongsTo('PositionModel', 'position_id')->first();
    }

    /**
     * Загрузка картинки по-умолчанию
     */
    public function defaultImage()
    {
        return $this->belongsTo('PhotoModel', 'photo_id')->first();
    }

}