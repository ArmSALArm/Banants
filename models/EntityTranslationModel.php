<?php if(!defined('ROOT_PATH')){header('HTTP/1.0 404 Not Found'); die("<h1>404 Not Found</h1>The page that you have requested could not be found.");}

/**
 * Created by PhpStorm.
 * User: Arsen
 * Date: 11/27/2015
 * Time: 12:06 PM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class EntityTranslationModel extends Eloquent
{
    public $timestamps = false;

    protected $table = 'entities_translations';

    protected $fillable = ['text', 'lang_id', 'entity_id'];

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($entityModel) { // before delete() method call this

            $entityModel->translations()->delete();
            // do the rest of the cleanup...
        });
    }

    public function entity()
    {
//        return $this->hasMany('EntityTranslationModel', 'entity_id');
        return $this->belongsTo('EntityModel', 'entity_id');
    }

//    protected $guarded = ['id'];
}