<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\ProductTag;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;
use CodeCommerce\Tag;
use CodeCommerce\Product;

class StoreController extends Controller
{
    private $tag;
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function index(Category $category, Product $product)
    {
    	$pFeatured = $product->featured()->get();

    	$pRecomended = $product->recomend()->get();

    	$categories = $category->all();

        $tags = $this->tag->all();

        return view('store.index',compact('categories','pFeatured','pRecomended','tags'));
    }

    public function productsCategory(Category $category, Product $product,$id)
    {
    	$categories = $category->all();

    	$category = $category->find($id);

    	$prodcutsCateogry = $product->ofCategory($id)->get();

        $tags = $this->tag->all();
    	
    	return view('store.productsCategory',compact('categories','category','prodcutsCateogry','tags'));
    }

    public function productDetail(Category $category, Product $products,$id)
    {
        $categories = $category->all();

        $product = $products->find($id);

        $tags = $this->tag->all();
      //  dd($product->tags);
        return view('store.productDetail',compact('categories','product','tags'));
    }

    public function porudctTag(Category $category, $id)
    {
        $categories = $category->all();

        $productsTag = $this->tag->find($id);

        $tags = $this->tag->all();

        //  dd($product->tags);
        return view('store.productsTag',compact('categories','tags', 'productsTag'));
    }
    

}
