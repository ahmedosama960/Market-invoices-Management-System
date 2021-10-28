<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory,SoftDeletes,HasTranslations;

    public $guarded=[];
    public $translatable= ['name'] ;


    public function category(){
        return $this->belongsTo(category::class,'cat_id');
    }


}
