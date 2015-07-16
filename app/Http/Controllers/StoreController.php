<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Product;

class StoreController extends Controller
{
    public function index(Category $category, Product $product)
    {
    	$pFeatured = $product->featured()->get();

    	$pRecomended = $product->recomend()->get();

    	$categories = $category->all();
    	return view('store.index',compact('categories','pFeatured','pRecomended'));
    }
}
