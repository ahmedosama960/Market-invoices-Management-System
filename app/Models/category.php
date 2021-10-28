<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class category extends Model
{
    use HasFactory;
    use HasTranslations;

    public $guarded=[];
    public $translatable = ['name'];


    public function products(){
        return $this->hasMany(product::class,'cat_id');
    }


}
