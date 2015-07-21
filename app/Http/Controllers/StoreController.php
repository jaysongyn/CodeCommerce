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

    public function productsCategory(Category $category, Product $product,$id)
    {
    	$categories = $category->all();

    	$category = $category->find($id);

    	$prodcutsCateogry = $product->ofCategory($id)->get();
    	
    	
    	return view('store.productsCategory',compact('categories','category','prodcutsCateogry'));
    }

    public function productDetail(Category $category, Product $products,$id)
    {
        $categories = $category->all();
        
        $product = $products->find($id);

     
                
        return view('store.productDetail',compact('categories','product'));
    }
    

}
