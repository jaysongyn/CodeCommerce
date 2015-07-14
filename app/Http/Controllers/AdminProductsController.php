<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Category;

class AdminProductsController extends Controller
{

    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->productModel->paginate(10);

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = $category->lists('name','id');

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ProductRequest $Request)
    {
        $input = $Request->all();

        $products = $this->productModel->fill($input);

        $products->save();

        return redirect()->route('products.index');
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id, Category $category)
    {

        $categories = $category->lists('name','id');

        $product = $this->productModel->find($id);

        return view('products.edit',compact('product','categories'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(requests\ProductRequest $request,$id)
    {
        $this->productModel->find($id)->update($request->all());

        return redirect()->route('products.index');


    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products.index');
    }
}
