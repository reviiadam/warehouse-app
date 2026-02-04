<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    protected $fillable = ['product_id', 'qty', 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
