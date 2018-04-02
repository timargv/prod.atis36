<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Provider;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    //-****************************
    //
    public function index()
    {
        $products = Product::all();
        $categories = Category::pluck('title', 'id')->all();
        $providers = Provider::pluck('name', 'id')->all();
        return view('admin.products.index', compact('categories', 'providers', 'products'));
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
          'site' => 'nullable',
          'prc' => 'nullable|numeric',
          'desc' => 'nullable',
          'image' => 'nullable|image',
          'category_id' => 'nullable',
          'provider_id' => 'nullable',
          'status' => 'nullable'
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
          'site' => 'nullable',
          'prc' => 'nullable',
          'desc' => 'nullable',
          'image' => 'nullable|image',
          'category_id' => 'nullable',
          'provider_id' => 'nullable',
          'status' => 'nullable'
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


    //-****************************************

    public function export()
    {
        $product = Product::with('provider', 'category')
            ->get()
            ->map(function (Product $product) {
                return [
                    'title' => $product->title,
                    'num' => $product->num,
                    'prc' => $product->prc,
                    'site' => $product->site ?? '',
                    'image' => $product->image,
                    'status' => $product->status,
                    'slug' => $product->slug,
                    'category' => $product->category->name ?? '',
                    'provider' => $product->provider->name ?? '',
                ];
            });
        return Excel::create('Экспорт Товаров', function ($excel) use ($product) {
            $excel->sheet('Лист', function ($sheet) use ($product) {
                $sheet->fromArray($product);
            });
        })->export('xlsx');

    }


    //-****************************************

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);
        $data = Excel::load($request->file('file')->getRealPath())->get();
        foreach ($data as $key => $value) {
            $attributes = $value->only('title', 'num', 'prc', 'image', 'status', 'category_id', 'provider_id', 'slug')->toArray();
            if ($value['provider']) {
                $provider = Provider::firstOrCreate([
                    'name' => $value['provider']
                ]);
                $attributes['provider_id'] = $provider->id;
            }
            if ($value['category']) {
                $category = Category::firstOrCreate([
                    'title' => $value['category']
                ]);
                $attributes['category_id'] = $category->id;
            }
            Product::create($attributes);
        }
        return back();
    }
}
