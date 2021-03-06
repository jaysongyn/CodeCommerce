<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Product;
use CodeCommerce\Category;
use CodeCommerce\Tag;
use CodeCommerce\ProductImage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
    public function store(Requests\ProductRequest $request)
    {

        $input = $request->except('tag');

        $imputTag = $request->input('tag');

        $tags = explode(',', $imputTag);

        $products = $this->productModel->fill($input);

        $products->save();

        $this->storeTag($tags,$products->id);

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
    public function update(requests\ProductRequest $request, Tag $tagModel,$id)
    {
        $input = $request->except('tag');

        $imputTag = $request->input('tag');

        $tags = explode(',', $imputTag);

        $this->storeTag($tags,$id);

        $this->productModel->find($id)->update($input);        

        return redirect()->route('products.index');


    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(ProductImage $image, $id)
    {
        $images = $image->ofProduct($id)->get();

        foreach ($images as $image) {
            $this->destroyImage($image,$image->id);
        }

        $this->productModel->find($id)->delete();

        return redirect()->route('products.index');
    }

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('products.images', compact('product'));

    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('products.create_image', compact('product'));
    }

    public function storeImage(requests\ProductImageRequest $request, $id, ProductImage $productImage)
    {

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create(['product_id'=>$id, 'extension'=>$extension]);

        Storage::disk('public_local')->put($image->id.'.'.$extension, File::get($file));

        return redirect()->route('products.images',$id);
    }

    public function destroyImage(ProductImage $productImage, $id)
    {
        $image = $productImage->find($id);

        if(file_exists(public_path().'/uploads/'.$image->id.'.'.$image->extension))
        {

            Storage::disk('public_local')->delete($image->id.'.'.$image->extension);
        }
           
        
        $product = $image->product;
        $image->delete();

        return redirect()->route('products.images', ['id'=>$product->id]);
        
    }

    private function storeTag($inputTags, $id)
    {
        $tag = new Tag();
        
        foreach ($inputTags as $key => $value) {
       
            $newTag = $tag->firstOrCreate(["name" => trim($value)]);
            $idTags[] = $newTag->id;
        }
              
        $product = $this->productModel->find($id);
        $product->tags()->sync($idTags);
       
    }
}
