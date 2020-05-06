<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable =[
              'id',
              'order_id',
              'product_id',
              'delivery_address',
              'mobile',
              'total',
              'quantity',
              'rate'
          ];

          protected $table = 'order_items';
}
