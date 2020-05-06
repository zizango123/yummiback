<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    //
    protected $fillable =[
              'id',
              'product_category',
              'product_image',
              'product_name',
              'product_description',
              'product_price_dollar',
              'product_price_euro',
              'created_at',
              'updated_at'





          ];

          protected $table = 'product';
}
