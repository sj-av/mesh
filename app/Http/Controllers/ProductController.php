<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{

    public function getProduct(Product $product)
    {
        return $product;
    }

    public function storeProduct(Product $product)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $result = $product->fill($data)->save();
        return ['success' => $result];
    }

    public function getProductsByCategory(Category $category)
    {
        return $category->products;
    }
}
