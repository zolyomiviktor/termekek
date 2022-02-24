<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termek extends Model
{
    use HasFactory;

    protected $fillable = [
        "productname", 
        "price",
        "commodity",
        "product_production_time"
    ]; 

}
