<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use Illuminate\Http\Request;
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
        'desc' => 'nullable'
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
        'desc' => 'nullable'
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

















}
