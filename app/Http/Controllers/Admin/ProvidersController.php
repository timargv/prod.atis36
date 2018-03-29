<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ProvidersController extends Controller
{

    //-****************************
    // Таблица с Поставщиками

    public function index()
    {
      $providers = Provider::all();
      return view('admin.provider.index', ['providers' => $providers]);
    }


    //-****************************
    // Форма создания Поставщика

    public function create()
    {
      return view('admin.provider.create');
    }


    //-****************************
    // Функция получения запроса на запись Поставщика в базу данных

    public function store(Request $request)
    {
      // Проверка на валидность поля ввода и объязательность
      $this->validate($request, [
        'name' => 'required',
        'link' => 'required',
        'desc' => 'nullable',
        'full_name_provider' => 'nullable',
        'ur_address_provider' => 'nullable',
        'fz_address_provider' => 'nullable',
        'inn_provider' => 'nullable|numeric',
        'kpp_provider' => 'nullable|numeric',
        'rsch_provider' => 'nullable|numeric',
        'krch_provider' => 'nullable|numeric',
        'bancon_provider' => 'nullable',
        'bik_provider' => 'nullable|numeric',
        'ogrn_provider' => 'nullable|numeric',
        'telephone_provider' => 'nullable',
        'director_provider' => 'nullable',
        'email_provider' => 'nullable|email'
      ]);

      Provider::create($request->all());
      return redirect()->route('providers.index');
    }


    //-****************************
    // Форма редактирования Поставщика

    public function edit($id)
    {
      $provider = Provider::find($id);
      return view('admin.provider.edit', ['provider' => $provider]);
    }


    //-****************************
    // Форма обнавления Поставщика

    public function update(Request $request, $id)
    {
      // Проверка на валидность поля ввода и объязательность
      $this->validate($request, [
        'name' => 'required',
        'link' => 'required',
        'desc' => 'nullable',
        'full_name_provider' => 'nullable',
        'ur_address_provider' => 'nullable',
        'fz_address_provider' => 'nullable',
        'inn_provider' => 'nullable|numeric',
        'kpp_provider' => 'nullable|numeric',
        'rsch_provider' => 'nullable|numeric',
        'krch_provider' => 'nullable|numeric',
        'bancon_provider' => 'nullable',
        'bik_provider' => 'nullable|numeric',
        'ogrn_provider' => 'nullable|numeric',
        'telephone_provider' => 'nullable',
        'director_provider' => 'nullable',
        'email_provider' => 'nullable|email'
      ]);

      $provider = Provider::find($id);
      $provider->update($request->all());

      return redirect()->route('providers.index');
    }


    //-****************************
    // Функция удаления Поставщика

    public function destroy($id)
    {
      Provider::find($id)->delete();
      return redirect()->route('providers.index');
    }

    public function del(Request $request) {
        $delid = $request->input('delid');

        Provider::whereIn('id', $delid)->delete();
        return redirect()->route('providers.index')->with('sec', 'provider');

    }



    public  function export() {
        $provider = Provider::select('name', 'link', 'slug')->get();
        return Excel::create('Экспорт Поставщиков', function ($excel) use($provider) {
            $excel->sheet('mysheet', function ($sheet) use ($provider) {
                $sheet->fromArray($provider);
            });
        })->export('xlsx');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(Request $request) {
        if($request->file('file'))
        {
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()) {
                foreach ($data as $key => $value) {
                    Provider::create([
                        'name' => $value['name'],
                        'desc' => $value['desc'],
                        'link' => $value['link'],
                    ]);
                }


//            foreach ($data->toArray() as $key => $value) {
//                if (!empty($value)) {
//                    foreach ($value as $v) {
//                        $provider = new Provider();
//                        $provider[] = ['name' => $v['name'],
//                            'desc' => $v['desc'],
//                            'link' => $v['link'],
////                            'comp_id' => $request->get('Comp_id'),
//                        ];
//                    }
//                }
//                $provider->save();
//
//            }
            }
        }
        return back();
    }

}
