<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Provider;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    //-****************************
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    //-****************************
    //
    public function create()
    {
        $categories = Category::pluck('title', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.products.create', compact('categories', 'providers'));
    }

    //-****************************
    //
    public function store(Request $request)
    {
        //
        $this->validate($request, [
          'title' => 'required',
          'num' => 'required',
          'site' => 'required',
          'prc' => 'required',
          'desc' => 'nullable',
          'date' => 'nullable',
          'image' => 'nullable|image',
          'provider_id' => 'nullable',
          'status' => 'required'
        ]);

        $product = Product::add($request->all());
        $product->uploadImage($request->file('image'));
        $product->setCategory($request->get('category_id'));
        $product->setProvider($request->get('provider_id'));
        $product->toggleStatus($request->get('status'));
        return  redirect()->route('products.index');
    }


    //-****************************
    //
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.products.edit', compact('categories', 'providers', 'product'));
    }

    //-****************************
    //
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
          'title' => 'required',
          'num' => 'required',
          'site' => 'required',
          'prc' => 'required',
          'desc' => 'nullable',
          'date' => 'nullable',
          'image' => 'nullable|image',
          'provider_id' => 'nullable',
          'status' => 'required'
        ]);

        $product = Product::find($id);
        $product->edit($request->all());
        $product->uploadImage($request->file('image'));
        $product->setCategory($request->get('category_id'));
        $product->setProvider($request->get('provider_id'));
        $product->toggleStatus($request->get('status'));
        return  redirect()->route('products.index');
    }

    //-****************************
    //
    public function destroy($id)
    {
        //
        Product::find($id)->remove();
        return redirect()->route('products.index');;
    }
}
