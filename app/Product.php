<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = 'id';

    use Rateable;
}
