<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Category;

class AdminCategoriesController extends Controller
{

    private $categoryModel;
    public function __construct(Category $category)
    {
        $this->categoryModel = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->categoryModel->all();

         return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\CategoryRequest $request)
    {
       $input = $request->all();

       $category = $this->categoryModel->fill($input);

       $category->save();

       return redirect()->route('categories.index');
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
    public function edit($id)
    {
       
       $category = $this->categoryModel->find($id);

       return view ('categories.edit',compact('category'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Requests\CategoryRequest $request,$id)
    {
        $this->categoryModel->find($id)->update($request->all());
       
        return redirect()->route('categories.index');
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect()->route('categories.index');
    }
}
