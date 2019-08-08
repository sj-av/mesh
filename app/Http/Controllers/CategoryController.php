<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function tree(Category $category = null)
    {
        if ($category !== null) return $this->treeForCategory($category);
        return Category::all()->toHierarchy();
    }

    public function list()
    {
        return Category::all();
    }

    public function treeForCategory($category)
    {
        return $category->getDescendantsAndSelf()->toHierarchy();
    }

    public function getCategory(Category $category)
    {
        return $category;
    }
}
