<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[

              'id',
              'user_id',
              'address_id',
              'delivery_address',
              'mobile',
              'total',

              'delivery_charge',
              'gst_amount',
              'packaging',
              'grand_total',
              'payment_type',
              'status'
          ];

          protected $table = 'orders';
}
