<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];


// 3 yol var, istediyini istifade ede bilersen ve rahati 2cidir:
    
    
    public function colors1(){
        return $this->hasMany(ProductColor::class,'product_id', 'id')
        ->select(
            'product_id',
            'color_id',
            'c.name as color'
        )
        ->join('colors as c', 'c.id', 'product_colors.color_id');
    }


    public function colors2() 
    {
        return $this->hasMany(ProductColor::class,'product_id', 'id')
        ->with('color');
        
    }

    public function colors3()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'color_id');
    }


}
