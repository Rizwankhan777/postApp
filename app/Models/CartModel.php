<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_Qty',
      ];

      public function cartProducts(){
        return $this->belongsTo(ProductModel::class, 'product_id' , 'id');
      }

}
