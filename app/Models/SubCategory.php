<?php

namespace App\Models;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected  $tables  = "sub_categories";

    protected $guarded = [ ];

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public function subsubcategory(){
      return $this->hasMany(SubSubCategory::class);
    }
}
