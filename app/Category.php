<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategory;

class Category extends Model
{
    //protected $fillable = ['name', 'slug', 'description', 'image',  'pa'];
    protected $guarded = [];

    public function parent()
    {
        // return $this -> hasMany(Subcategory::class);
        return $this -> hasOne(self::class, 'id', 'parent_id');
    }


    public function subcategory() {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }


    public static function getMainCategories() {
        return self::where('parent_id', '=', 0)->orWhereNull('parent_id')->get();
    }
}
