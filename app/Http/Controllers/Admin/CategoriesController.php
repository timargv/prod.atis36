<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesController extends Controller
{
    //
    public function index() {

        $categories = Category::all();

        return view('admin.category.index', ['categories' => $categories]);
    }

    //-********************************

    public function create() {

        return view('admin.category.create');

    }

    //-********************************

    public function store(Request $request) {

        $this->validate($request, [
            'title' => 'required'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    //-********************************

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', ['category'=>$category]);
    }

    //-********************************

    public function update(Request $request, $id) {

        $this->validate($request, [
            'title' => 'required'
        ]);

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('categories.index');

    }

    //-********************************

    public function destroy($id) {

        Category::find($id)->delete();
        return redirect()->route('categories.index');
    }


    //-********************************
    public  function export() {
        $provider = Category::select('title', 'slug')->get();
        return Excel::create('Экспорт Категории', function ($excel) use($provider) {
            $excel->sheet('mysheet', function ($sheet) use ($provider) {
                $sheet->fromArray($provider);
            });
        })->export('xlsx');
    }

    public function import(Request $request) {
        $this->validate($request, [
            'file' => 'required',
        ]);

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path, function($reader) {})->get();
        if(!empty($data) && $data->count()) {
            foreach ($data as $key => $value) {
              Category::create([
                  'title' => $value->title,
              ]);
            }
        }
        return back();
    }
}
