<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class invoice extends Model
{
    use HasFactory,HasTranslations;

    public $guarded=[];

    public $translatable=['name'];

    public function category(){
        return $this->belongsTo(category::class,'categorie_id');
    }

    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }
}
