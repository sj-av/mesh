<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Baum\NestedSet\Node as WorksAsNestedSet;

class Category extends Model
{
    use WorksAsNestedSet;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
