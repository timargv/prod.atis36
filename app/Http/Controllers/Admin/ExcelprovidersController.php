<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelprovidersController extends Controller
{

    public function index() {
        return view('admin.import-export.index');
    }

//    public  function export() {
//        $provider = Provider::select('name', 'link', 'slug')->get();
//        return Excel::create('Экспорт Поставщиков', function ($excel) use($provider) {
//            $excel->sheet('mysheet', function ($sheet) use ($provider) {
//                $sheet->fromArray($provider);
//            });
//        })->export('xlsx');
//    }
//
//
//
//    public function import(Request $request) {
//        if ($request->hasFile('file')) {
//            $path = $request->file('file')->getRealPath();
//            $data = Excel::load($path, function ($reader) {})->get();
//
//            foreach ($data->toArray() as $key => $value) {
//                if (!empty($value)) {
//                    foreach ($value as $v) {
//                        $provider = new Provider();
//                        $provider[] = ['name' => $v['name'],
//                            'desc' => $v['desc'],
//                            'link' => $v['link'],
////                            'comp_id' => $request->get('Comp_id'),
//                        ];
//                        $provider->save();
//                    }
//                }
//            }
//        }
//    }
}
