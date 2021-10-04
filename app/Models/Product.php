<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    //chỉ định teeb tavle trong trường hợp không đăt tên theo Eloquent
    protected $table ='products';
    //mặc định Eloquent coi primary key là cột id
    protected $primarykey='id';

    protected $fillable=[
        'name',
        'price',
        'quantity',
        'category_id',

    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
